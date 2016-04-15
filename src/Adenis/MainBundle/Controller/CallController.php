<?php

namespace Adenis\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Adenis\MainBundle\Entity\RepositoryName;
use Adenis\MainBundle\Form\SearchCdrent;
use Adenis\MainBundle\Form\SearchClient;
use Adenis\MainBundle\Form\SearchPlace;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Adenis\MainBundle\Util\Util;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/main/call")
 */
class CallController extends Controller {

    /**
     * @Route("/search", name="main_call_search")
     * @Template()
     */
    public function searchAction(Request $request) {

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        //View
        $listCdrent = array();

        //var
        $limit = 15;
        $count = 0;
        $page = 1;
        $search_params = array();
        
        $default = $request->get('default');
        if ($default == 'true') {
            //$count = $repCdrent->count();
            //$listCdrent = $repCdrent->findBy(array(), array('calldate'=>'desc'), $limit);
        }

        $dst = $request->get('dst');
        if ($dst != null) {
            $search_params['dst'] = $dst;
        }

        $src = $request->get('src');
        if ($src != null) {
            $search_params['src'] = $src;
        }

        $dateini = $request->get('dateini');
        if ($dateini != null) {
            //$search_params['dateini'] = \DateTime::createFromFormat('d-m-Y', $dateini);
            $search_params['dateini'] = $dateini;
        }

        $datefin = $request->get('datefin');
        if ($datefin != null) {
            //$search_params['datefin'] = \DateTime::createFromFormat('d-m-Y', $datefin);
            $search_params['datefin'] = $datefin;
        }
        
        $durationmin = $request->get('durationmin');
        if ($durationmin != null) {
            //$search_params['dateini'] = \DateTime::createFromFormat('d-m-Y', $dateini);
            $search_params['durationmin'] = $durationmin;
        }
        
        $durationmax = $request->get('durationmax');
        if ($durationmax != null) {
            //$search_params['dateini'] = \DateTime::createFromFormat('d-m-Y', $dateini);
            $search_params['durationmax'] = $durationmax;
        }

        if ($request->get('page') != null) {
            $page = $request->get('page');
            $search_params['page'] = $request->get('page');
        }

        if (!empty($search_params)) {
            $count = $repCdrent->countSearch($search_params);
            $listCdrent = $repCdrent->search($search_params, $limit, $page - 1);

            $session = new Session();
            $session->start();
            $session->set('params', $search_params);
        }

        return array(
            'search_params' => $search_params,
            'listCdrent' => $listCdrent,
            'page' => $page,
            'count' => $count,
            'limit' => $limit,
            'pages' => round($count / $limit, 0, PHP_ROUND_HALF_UP),
            'default' => 'true'
        );
    }

    /**
     * @Route("/paginate/{page}", name="main_call_paginate")
     * @Template()
     */
    public function paginateAction(Request $request) {
        //get params
        $page = $request->get('page');

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        //View
        $listCdrent = array();

        //var
        $limit = 15;
        $count = 0;

        $session = new Session();
        $session->start();
        $search_params = $session->get('params');
        $params = '';

        if (!empty($search_params)) {
            $count = $repCdrent->countSearch($search_params);
            $listCdrent = $repCdrent->search($search_params, $limit, ($page - 1) * $limit);

            $op = '?';
            foreach ($search_params as $k => $v) {
                $params = $params . $op . $k . '=' . $v;
                $op = '&';
            }
        }

        return $this->redirect($this->generateUrl('main_call_search') . $params . '&page=' . $page);
    }

    /**
     * @Route("/telephone/{number}", defaults={"number" = 0}, name="main_call_telephone")
     * @Template()
     */
    public function telephoneAction(Request $request) { //src
        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        //getParams
        $nparam = $request->get('number');
        $number = Util::correctNumber(str_replace("'", "", $nparam));
        $statistics = array();
        $statistics['totalcalls'] = $repCdrent->countSearch(array('numero' => $number));
        $statistics['totaltime'] = Util::secondsToTime( $repCdrent->sumSearch(array('numero' => $number)));

        return array(
            'number' => $number,
            'statistics' => $statistics
        );
    }

    /**
     * @Route("/statisticsglobal", name="main_call_statisticsglobal")
     * @Template()
     */
    public function statisticsglobalAction(Request $request) {

        $search_params = array();

        $dateini = $request->get('dateini');
        if ($dateini != null) {
            //$search_params['dateini'] = \DateTime::createFromFormat('d-m-Y', $dateini);
            $search_params['dateini'] = $dateini;
        }

        $datefin = $request->get('datefin');
        if ($datefin != null) {
            //$search_params['datefin'] = \DateTime::createFromFormat('d-m-Y', $datefin);
            $search_params['datefin'] = $datefin;
        }

        $durationmin = $request->get('durationmin');
        if ($durationmin != null) {
            $search_params['durationmin'] = $durationmin;
        }

        $durationmax = $request->get('durationmax');
        if ($durationmax != null) {
            $search_params['durationmax'] = $durationmax;
        }

        //repositoires
        $em = $this->getDoctrine()->getManager();
        $repCdrent = $em->getRepository(RepositoryName::Cdrent);

        $statistics = array();

        //alltypes
        $results = $repCdrent->search3($search_params);
        $numtotal = 0;
        $sumtotal = 0;
        $numtotal_ContactNull = 0;
        $sumtotal_ContactNull = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $contact['codeContact'] = $r['codecontact'];
                $contact['nomContact'] = $r['nomcontact'];
                $contact['numTotal'] = $r['num'];
                $contact['sumTotal'] = Util::secondsToTime( $r['sum']);
                $contact['numAnswered'] = 0;
                $contact['sumAnswered'] = Util::secondsToTime(  0);
                $contact['numNotAnswered'] = 0;
                $contact['sumNotAnswered'] = Util::secondsToTime(  0);
                $contact['numSpecialNum'] = 0;
                $contact['sumSpecialNum'] = Util::secondsToTime(  0);
                $statistics[$r['codecontact']] = $contact;
            } else{
                $numtotal_ContactNull = $numtotal_ContactNull + $r['num'];
                $sumtotal_ContactNull = $sumtotal_ContactNull + $r['sum'];                
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
        $numanswered_ContactNull = 0;
        $sumanswered_ContactNull = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $statistics[$r['codecontact']]['numAnswered'] = $r['num'];
                $statistics[$r['codecontact']]['sumAnswered'] = Util::secondsToTime(  $r['sum']);
                $statistics[$r['codecontact']]['numNotAnswered'] = $statistics[$r['codecontact']]['numTotal'] - $r['num'];
                $statistics[$r['codecontact']]['sumNotAnswered'] = $statistics[$r['codecontact']]['sumTotal'] - $r['sum'];
            } else {
                $numanswered_ContactNull = $numanswered_ContactNull + $r['num'];
                $sumanswered_ContactNull = $sumanswered_ContactNull + $r['sum'];                
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
        $numspecialnum_ContactNull = 0;
        $sumspecialnum_ContactNull = 0;
        foreach ($results as $r) {
            if ($r['codecontact'] != null) {
                $statistics[$r['codecontact']]['numSpecialNum'] = $r['num'];
                $statistics[$r['codecontact']]['sumSpecialNum'] = Util::secondsToTime( $r['sum']);
            } else {
                $numspecialnum_ContactNull = $numspecialnum_ContactNull + $r['num'];
                $sumspecialnum_ContactNull = $sumspecialnum_ContactNull + $r['sum'];                
            }
            $numspecialnum = $numspecialnum + $r['num'];
            $sumspecialnum = $sumspecialnum + $r['sum'];
        }
        unset($search_params['clid']);
        unset($r);
        
        $statistics_null_specials = array();

        // *****
        // Total
        // *****
        $contact['codeContact'] = 't';
        $contact['nomContact'] = 'TOTAL';
        $contact['numTotal'] = $numtotal;
        $contact['sumTotal'] = Util::secondsToTime( $sumtotal);
        $contact['numAnswered'] = $numanswered;
        $contact['sumAnswered'] = Util::secondsToTime( $sumanswered);
        $contact['numNotAnswered'] = $numtotal - $numanswered;
        $contact['sumNotAnswered'] = Util::secondsToTime(  0);
        $contact['numSpecialNum'] = $numspecialnum;
        $contact['sumSpecialNum'] = Util::secondsToTime( $sumspecialnum);
        $statistics_null_specials[0] = $contact;
        
        // ************
        // Contact Null
        // ************
        $contact['codeContact'] = 'sc';
        $contact['nomContact'] = 'SANS CONTACT';
        $contact['numTotal'] = $numtotal_ContactNull;
        $contact['sumTotal'] = Util::secondsToTime( $sumtotal_ContactNull);
        $contact['numAnswered'] = $numanswered_ContactNull;
        $contact['sumAnswered'] = Util::secondsToTime( $sumanswered_ContactNull);
        $contact['numNotAnswered'] = $numtotal_ContactNull - $numanswered_ContactNull;
        $contact['sumNotAnswered'] = Util::secondsToTime(  0);
        $contact['numSpecialNum'] = $numspecialnum_ContactNull;
        $contact['sumSpecialNum'] = Util::secondsToTime( $sumspecialnum_ContactNull);
        $statistics_null_specials[1] = $contact;

        $session = new Session();
        $session->start();
        $session->set('statisticsglobal', $statistics);
        $session->set('searchparams', $search_params);

        return array(
            'statistics' => $statistics,
            'statistics_null_specials' => $statistics_null_specials,
            'searchparams' => $search_params
        );
    }

    /**
     * @Route("/exportxls", name="main_call_exportxls")
     * @Template()
     */
    public function exportxlsAction() {

        $session = new Session();
        $session->start();
        $statistics = $session->get('statisticsglobal');

        // ask the service for a Excel5
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        //preparer le document
        $phpExcelObject->getProperties()->setCreator("Adenis")
                ->setLastModifiedBy("Adenis")
                ->setTitle("Equipments Client Adenis")
                ->setSubject("Equipments Client Adenis")
                ->setDescription("Equipments Client Adenis to XLSX from PHP")
                ->setKeywords("Equipments Client Adenis Excel XLSX PHP")
                ->setCategory("Equipments Adenis");

        //ecrire les entetes des colonnes
        $col = 1;
        $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('A' . $col, 'Code')
                ->setCellValue('B' . $col, 'Contact')
                ->setCellValue('C' . $col, 'Total')
                ->setCellValue('D' . $col, 'Billsec (h:m:s)')
                ->setCellValue('E' . $col, 'Not answered')
                ->setCellValue('F' . $col, 'Answered')
                ->setCellValue('G' . $col, 'Special numbers')
                ->setCellValue('H' . $col, 'Billsec (h:m:s)');

        //longeur
        $phpExcelObject->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcelObject->getActiveSheet()->getColumnDimension('H')->setWidth(30);

        //style
        $phpExcelObject->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);

        foreach ($statistics as $s) {
            $col++;
            $phpExcelObject->setActiveSheetIndex(0)
                    ->setCellValue('A' . $col, $s['codeContact'])
                    ->setCellValue('B' . $col, $s['nomContact'])
                    ->setCellValue('C' . $col, $s['numTotal'])
                    ->setCellValue('D' . $col, $s['sumTotal'])
                    ->setCellValue('E' . $col, $s['numNotAnswered'])
                    ->setCellValue('F' . $col, $s['numAnswered'])
                    ->setCellValue('G' . $col, $s['numSpecialNum'])
                    ->setCellValue('H' . $col, $s['sumSpecialNum']);
        }

        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers and filename
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $filename = "statistics_" . date("m-d-Y") . ".xls";
        $response->headers->set('Content-Disposition', 'attachment;filename=' . $filename);
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;
    }

}
