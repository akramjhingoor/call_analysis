<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adenis\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;
use PDO;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Adenis\MainBundle\Entity\Interlocuteur;
use Adenis\MainBundle\Util\Util;

/**
 * Description of CdrentRepository
 *
 * @author akramjhin
 */
class InterlocuteurRepository {

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
    const TABLE_INTER = 'INTERLOCUTEURFICHE';
    //champ
    const I_CODE = 'I_CODE';
    const I_CODECONTACT = 'I_CODECONTACT';
    const I_QUALIF = 'I_QUALIF';
    const I_NOM = 'I_NOM';
    const I_PRENOM = 'I_PRENOM';
    const I_FAMILLEINTERLOC = 'I_FAMILLEINTERLOCUTEUR';
    const I_TEL1 = 'I_TEL1';
    const I_TEL2 = 'I_TEL2';
    const I_TEL3 = 'I_TEL3';
    const I_TEL4 = 'I_TEL4';
    const I_EMAIL = 'I_EMAIL';
    const I_DATEMODIF = 'I_DATEMODIF';
    const I_DATECREATION = 'I_DATECREATION';
    const I_SERVICE = 'I_SERVICE';
    const I_ADRESSE = 'I_ADRESSE';
    const I_ADRESSE2 = 'I_ADRESSE2';
    const I_ADRESSE3 = 'I_ADRESSE3';
    const I_ADRESSE4 = 'I_ADRESSE4';
    const I_CP = 'I_CP';
    const I_VILLE = 'I_VILLE';
    const I_PAYS = 'I_PAYS';
    const I_VENDEUR = 'I_VENDEUR';

    public function findByContact($codeContact) {

        $result = $this->db->query("SELECT * FROM " . self::TABLE_INTER . " WHERE " . self::I_CODECONTACT . " = '$codeContact'");

        $listInterloc = array();

        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
            $interloc = new Interlocuteur();
            $interloc->setCode(utf8_encode($rows[self::I_CODE]));
            $interloc->setCodecontact(utf8_encode($rows[self::I_CODECONTACT]));
            $interloc->setPrenom(utf8_encode($rows[self::I_PRENOM]));
            $interloc->setNom(utf8_encode($rows[self::I_NOM]));
            $interloc->setFamilleinterlocuteur(utf8_encode($rows[self::I_FAMILLEINTERLOC]));
            $interloc->setTel1(utf8_encode($rows[self::I_TEL1]));
            $interloc->setTel2(utf8_encode($rows[self::I_TEL2]));
            $interloc->setTel3(utf8_encode($rows[self::I_TEL3]));
            $interloc->setTel4(utf8_encode($rows[self::I_TEL4]));
            $interloc->setEmail(utf8_encode($rows[self::I_EMAIL]));
            $interloc->setDatemodif(utf8_encode($rows[self::I_DATEMODIF]));
            $interloc->setDatecreation(utf8_encode($rows[self::I_DATECREATION]));
            $interloc->setService(utf8_encode($rows[self::I_SERVICE]));
            $interloc->setAdresse(utf8_encode($rows[self::I_ADRESSE]));
            $interloc->setAdresse2(utf8_encode($rows[self::I_ADRESSE2]));
            $interloc->setAdresse3(utf8_encode($rows[self::I_ADRESSE3]));
            $interloc->setAdresse4(utf8_encode($rows[self::I_ADRESSE4]));
            $interloc->setCp(utf8_encode($rows[self::I_CP]));
            $interloc->setVille(utf8_encode($rows[self::I_VILLE]));
            $interloc->setPays(utf8_encode($rows[self::I_PAYS]));
            $interloc->setVendeur(utf8_encode($rows[self::I_VENDEUR]));
            array_push($listInterloc, $interloc);
        }
        return $listInterloc;
    }

}
