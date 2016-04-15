<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adenis\MainBundle\Entity;

use PDO;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Adenis\MainBundle\Entity\Contact;

/**
 * Description of ContactRepository
 *
 * @author txema
 */
class ContactRepository {

    private $container;
    private $db;

    /**
     * Constructor
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->db = $this->container->get('db2');
    }

    //table
    const TABLE = 'CONTACTFICHE';
    //columns
    const C_CODE = 'C_CODE';
    const C_NOM = 'C_NOM';
    const C_ADRESSE = 'C_ADRESSE';
    const C_CP = 'C_CP';
    const C_VILLE = 'C_VILLE';
    const C_PAYS = 'C_PAYS';
    const C_TEL1 = 'C_TEL1';
    const C_TEL2 = 'C_TEL2';
    const C_TEL3 = 'C_TEL3';
    const C_TEL4 = 'C_TEL4';
    const C_EMAIL = 'C_EMAIL';
    const C_ADRESSE2 = 'C_ADRESSE2';
    const C_ADRESSE3 = 'C_ADRESSE3';
    const C_ADRESSE4 = 'C_ADRESSE4';

    public function find($code) {

        //$query = "select * from " . self::TABLE;
        //$operator = "";
        $result = $this->db->query("select * from " . self::TABLE . " where " . self::C_CODE . "='$code'");

        $contact = new Contact();

        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
            $contact->setCode(utf8_encode($rows[self::C_CODE]));
            $contact->setNom(utf8_encode($rows[self::C_NOM]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setCp(utf8_encode($rows[self::C_CP]));
            $contact->setVille(utf8_encode($rows[self::C_VILLE]));
            $contact->setPays(utf8_encode($rows[self::C_PAYS]));
            $contact->setTel1(utf8_encode($rows[self::C_TEL1]));
            $contact->setTel2(utf8_encode($rows[self::C_TEL2]));
            $contact->setTel3(utf8_encode($rows[self::C_TEL3]));
            $contact->setTel4(utf8_encode($rows[self::C_TEL4]));
            $contact->setEmail(utf8_encode($rows[self::C_EMAIL]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setAdresse2(utf8_encode($rows[self::C_ADRESSE2]));
            $contact->setAdresse3(utf8_encode($rows[self::C_ADRESSE3]));
            $contact->setAdresse4(utf8_encode($rows[self::C_ADRESSE4]));
        }

        return $contact;
    }

    public function findAll() {

        $result = $this->db->query("select * from " . self::TABLE . " order by " . self::C_NOM);
        //$result = $this->db->query("select FIRST 10 SKIP 0 * from " . self::TABLE . " order by " . self::C_NOM);
        $contacts = array();
        $contact = new Contact();

        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
            $contact = new Contact();
            $contact->setCode(utf8_encode($rows[self::C_CODE]));
            $contact->setNom(utf8_encode($rows[self::C_NOM]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setCp(utf8_encode($rows[self::C_CP]));
            $contact->setVille(utf8_encode($rows[self::C_VILLE]));
            $contact->setPays(utf8_encode($rows[self::C_PAYS]));
            $contact->setTel1(utf8_encode($rows[self::C_TEL1]));
            $contact->setTel2(utf8_encode($rows[self::C_TEL2]));
            $contact->setTel3(utf8_encode($rows[self::C_TEL3]));
            $contact->setTel4(utf8_encode($rows[self::C_TEL4]));
            $contact->setEmail(utf8_encode($rows[self::C_EMAIL]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setAdresse2(utf8_encode($rows[self::C_ADRESSE2]));
            $contact->setAdresse3(utf8_encode($rows[self::C_ADRESSE3]));
            $contact->setAdresse4(utf8_encode($rows[self::C_ADRESSE4]));
            array_push($contacts, $contact);
        }

        return $contacts;
    }

    public function searchDinamic($term) {
        $term = trim(preg_replace('/( ){2,}/u', ' ', $term));

        $result = $this->db->query("select * from " . self::TABLE . " where " . self::C_NOM . " like '%$term%' order by " . self::C_NOM);
        $contacts = array();
        $contact = new Contact();

        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
            $contact = new Contact();
            $contact->setCode(utf8_encode($rows[self::C_CODE]));
            $contact->setNom(utf8_encode($rows[self::C_NOM]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setCp(utf8_encode($rows[self::C_CP]));
            $contact->setVille(utf8_encode($rows[self::C_VILLE]));
            $contact->setPays(utf8_encode($rows[self::C_PAYS]));
            $contact->setTel1(utf8_encode($rows[self::C_TEL1]));
            $contact->setTel2(utf8_encode($rows[self::C_TEL2]));
            $contact->setTel3(utf8_encode($rows[self::C_TEL3]));
            $contact->setTel4(utf8_encode($rows[self::C_TEL4]));
            $contact->setEmail(utf8_encode($rows[self::C_EMAIL]));
            $contact->setAdresse(utf8_encode($rows[self::C_ADRESSE]));
            $contact->setAdresse2(utf8_encode($rows[self::C_ADRESSE2]));
            $contact->setAdresse3(utf8_encode($rows[self::C_ADRESSE3]));
            $contact->setAdresse4(utf8_encode($rows[self::C_ADRESSE4]));
            array_push($contacts, $contact);
        }

        return $contacts;
    }

    /**
     * Tree Menu (Explorateur) for 'Societies' section
     */
    public function getMenuTreeSocieties($societiesList) {

        $menutree = "<ul><li id=societies_0 data-jstree='{\"opened\":true, \"selected\":true}' >" . "Contacts";

        //$icon = "http://localhost/call_analysis/web/img/icon-society.gif";
        if ($societiesList != null) {
            $menutree .= "<ul>";
            foreach ($societiesList as $society) {

                $menutree .="<li id=society_" . $society->getCode() .
                        " data-jstree='{\"opened\":true, \"selected\":false}' >" . $society->getNom();
                $menutree .="</li>";
            }
            $menutree .= "</ul>";
        }

        $menutree .= "</li></ul>";

        return $menutree;
    }

}
