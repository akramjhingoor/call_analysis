<?php

namespace Adenis\MainBundle\Controller;

use PDO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use JpGraph\JpGraph;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Adenis\MainBundle\Entity\ContactRepository;
use Adenis\MainBundle\Entity\InterlocuteurRepository;
use Adenis\MainBundle\Entity\RepositoryName;
use Adenis\MainBundle\Entity\Statistics;
use Symfony\Component\HttpFoundation\Session\Session;
use \Adenis\MainBundle\Util\Util;

/**
 * @Route("/main/client")
 */
class ClientController extends Controller {

    /**
     * @Route("/contact/{code}", name="main_client_contact")
     * @Template()
     */
    public function contactAction($code, Request $request) {
        
        $code = str_replace("'","",$code);

        //Form params
        $searchparams = array();
        $dateini = $request->query->get('dateini');
        $datefin = $request->query->get('datefin');
        $durationmin = intval($request->query->get('durationmin'));
        $durationmax = intval($request->query->get('durationmax'));
        $isSearchForm = ($request->query->get('searchform') == 'true');

        $isSesionData = true;
        if ($dateini != null) {
            $searchparams['dateini'] = $dateini;
            $isSesionData = false;
        }
        if ($datefin != null) {
            $searchparams['datefin'] = $datefin;
            $isSesionData = false;
        }
        if ($durationmin != null) {
            $searchparams['durationmin'] = $durationmin;
            $isSesionData = false;
        }
        if ($durationmax != null) {
            $searchparams['durationmax'] = $durationmax;
            $isSesionData = false;
        }
        
        if($isSesionData && !$isSearchForm){
            $session = new Session();
            $session->start();
            $searchparams = $session->get('searchparams');
        }

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        $repContact = new ContactRepository($this->container);
        $repInterlocuteur = new InterlocuteurRepository($this->container);

        $contact = $repContact->find($code);
        $interlocuteurs = $repInterlocuteur->findByContact($code);

        $statistics = array();
        $numeros = $repCdrent->getNumerosSQL($interlocuteurs, $contact);
        $searchparams['numero'] = $numeros;
        $statistics = $this->getStatistics($searchparams); 
        
        if(empty($statistics)){
            $s['codeContact'] = $code;
            $s['nomContact'] = $contact->getNom();
            $s['numTotal'] = 0;
            $s['sumTotal'] = Util::secondsToTime( 0);
            $s['numAnswered'] = 0;
            $s['sumAnswered'] = Util::secondsToTime( 0);
            $s['numNotAnswered'] = 0;
            $s['numSpecialNum'] = 0;
            $s['sumSpecialNum'] = Util::secondsToTime(0);
            $statistics[0] = $s;    
        }

        $numeros = $repCdrent->getNumeros($interlocuteurs, $contact);
        $searchparams['numero'] = $numeros;    
        $listCdrent = $repCdrent->search2($searchparams); 

        return array(
            "contact" => $contact,
            "interlocuteurs" => $interlocuteurs,
            "statistics" => array_values($statistics)[0],
            "searchparams" => $searchparams,
            "listCdrent" => $listCdrent,
        );
    }

    /**
     * @Route("/contacts/{code}", defaults={"code" = ""},  name="main_client_contacts")
     * @Template()
     */
    public function contactsAction($code) {

        if ($code != null) {
            return $this->redirect($this->generateUrl('main_client_contact', array('code' => $code)));
        }

        $repContact = new ContactRepository($this->container);
        $contacts = $repContact->findAll();

        $menutree = $repContact->getMenuTreeSocieties($contacts);

        return array(
            //"contacts" => $contacts,
            "menutree" => $menutree,
        );
    }

    public function getStatistics($search_params) {

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        $statistics = array();

        //alltypes
        $results = $repCdrent->search3($search_params);
        $numtotal = 0;
        $sumtotal = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $contact['codeContact'] = $r['codecontact'];
                $contact['nomContact'] = $r['nomcontact'];
                $contact['numTotal'] = $r['num'];
                $contact['sumTotal'] = Util::secondsToTime($r['sum']);
                $contact['numAnswered'] = 0;
                $contact['sumAnswered'] = Util::secondsToTime(0);
                $contact['numNotAnswered'] = 0;
                //$contact['sumNotAnswered'] = Util::secondsToTime( 0);
                $contact['numSpecialNum'] = 0;
                $contact['sumSpecialNum'] = Util::secondsToTime(0);
                $statistics[$r['codecontact']] = $contact;
            } 
            $numtotal = $numtotal + $r['num'];
            $sumtotal = $sumtotal + $r['sum'];
        }  
        unset($r);

        //answered
        $search_params['disposition'] = 'ANSWERED';
        $results = $repCdrent->search3($search_params);
        $numanswered = 0;
        $sumanswered = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $statistics[$r['codecontact']]['numAnswered'] = $r['num'];
                $statistics[$r['codecontact']]['sumAnswered'] = Util::secondsToTime($r['sum']);
                $statistics[$r['codecontact']]['numNotAnswered'] = $statistics[$r['codecontact']]['numTotal'] - $r['num'];
                //$statistics[$r['codecontact']]['sumNotAnswered'] = $statistics[$r['codecontact']]['sumTotal'] - $r['sum'];
            }
            $numanswered = $numanswered + $r['num'];
            $sumanswered = $sumanswered + $r['sum'];
        }
        unset($search_params['disposition']);
        unset($r);

        //special numbers
        $search_params['clid'] = '"08%';
        $results = $repCdrent->search3($search_params);

        $numspecialnum = 0;
        $sumspecialnum = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $statistics[$r['codecontact']]['numSpecialNum'] = $r['num'];
                $statistics[$r['codecontact']]['sumSpecialNum'] = Util::secondsToTime($r['sum']);
            }
            $numspecialnum = $numspecialnum + $r['num'];
            $sumspecialnum = $sumspecialnum + $r['sum'];
        }
        unset($search_params['clid']);
        unset($r);
        
        $contact['codeContact'] = '';
        $contact['nomContact'] = 'TOTAL';
        $contact['numTotal'] = $numtotal;
        $contact['sumTotal'] = Util::secondsToTime($sumtotal);
        $contact['numAnswered'] = $numanswered;
        $contact['sumAnswered'] = Util::secondsToTime($sumanswered); 
        $contact['numNotAnswered'] = $numtotal - $numanswered;       
        //$contact['sumNotAnswered'] = Util::secondsToTime("H:i:s", 0);
        $contact['numSpecialNum'] = $numspecialnum;
        $contact['sumSpecialNum'] = Util::secondsToTime($sumspecialnum);   
        //array_unshift($statistics, $contact);

        return $statistics;
    }

    /**
     * @Route("/updatestatistics", name="main_client_updatestatistics")
     * @Template()
     */
    public function updatestatisticsAction(Request $request) {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '512M');

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        $repInterlocuteur = new InterlocuteurRepository($this->container);
        $repContact = new ContactRepository($this->container);

        $contacts = $repContact->findAll();
        foreach ($contacts as $contact) {
            //$statistics = array();
            
            echo $contact->getNom().'<br/>';
            
            $interlocuteurs = $repInterlocuteur->findByContact($contact->getCode());
            $numeros = $repCdrent->getNumeros($interlocuteurs, $contact);

            if ($numeros != null) {
                $searchparams['numero'] = $numeros;
                $listCdrent = $repCdrent->search2($searchparams);
                if (!empty($listCdrent)) {
                    foreach ($listCdrent as $cdrent) {
                        if ($cdrent->getCodecontact() == null) {
                            $cdrent->setCodecontact($contact->getCode());
                            $cdrent->setNomcontact($contact->getNom());
                            $em->flush();
                        }
                    }
                }
            }
        }

        echo 'Updatestatistics OK';
        exit;

        return array();
    }
    

    /*
     * Use with crone updatestatistics:run
     */
    public function updatestatistics($container) {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '512M');
        
        //repositoires
        $em = $container->get('doctrine')->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        $repInterlocuteur = new InterlocuteurRepository($container);
        $repContact = new ContactRepository($container);

        $contacts = $repContact->findAll();
        foreach ($contacts as $contact) {
            $interlocuteurs = $repInterlocuteur->findByContact($contact->getCode());
            $numeros = $repCdrent->getNumeros($interlocuteurs, $contact);

            if ($numeros != null) {
                $searchparams['numero'] = $numeros;
                $listCdrent = $repCdrent->search2($searchparams);
                if (!empty($listCdrent)) {
                    foreach ($listCdrent as $cdrent) {
                        if ($cdrent->getCodecontact() == null) {
                            $cdrent->setCodecontact($contact->getCode());
                            $cdrent->setNomcontact($contact->getNom());
                            $em->flush();
                        }
                    }
                }
            }
        }
    }
}
