<?php

namespace Adenis\MainBundle\Entity;

class Interlocuteur {

    private $id;
    private $code;
    private $compteur;
    private $codecontact;
    private $codesociete;
    private $qualif;
    private $nom;
    private $prenom;
    private $familleinterlocuteur;
    private $datenaissance;
    private $tel1;
    private $tel2;
    private $email;
    private $infolibre1;
    private $infolibre2;
    private $boollibre1;
    private $boollibre2;
    private $datemodif;
    private $datecreation;
    private $langue;
    private $service;
    private $interet;
    private $defaut;
    private $codeimport;
    private $codecontactimport;
    private $commentaire;
    private $tel3;
    private $tel4;
    private $hobbies;
    private $export;
    private $adresse;
    private $adresse2;
    private $adresse3;
    private $adresse4;
    private $cp;
    private $ville;
    private $pays;
    private $inactif;
    private $vendeur;
    private $email3;
    private $email4;
    private $email5;
    private $latitude;
    private $longitute;
    private $pasemailing;
    private $passms;
    private $boollibre3;
    private $boollibre4;
    private $boollibre5;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Interlocuteur
     */
    public function setCode($code) {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set compteur
     *
     * @param string $compteur
     * @return Interlocuteur
     */
    public function setCompteur($compteur) {
        $this->compteur = $compteur;

        return $this;
    }

    /**
     * Get compteur
     *
     * @return string 
     */
    public function getCompteur() {
        return $this->compteur;
    }

    /**
     * Set codecontact
     *
     * @param string $codecontact
     * @return Interlocuteur
     */
    public function setCodecontact($codecontact) {
        $this->codecontact = $codecontact;

        return $this;
    }

    /**
     * Get codecontact
     *
     * @return string 
     */
    public function getCodecontact() {
        return $this->codecontact;
    }

    /**
     * Set codesociete
     *
     * @param string $codesociete
     * @return Interlocuteur
     */
    public function setCodesociete($codesociete) {
        $this->codesociete = $codesociete;

        return $this;
    }

    /**
     * Get codesociete
     *
     * @return string 
     */
    public function getCodesociete() {
        return $this->codesociete;
    }

    /**
     * Set qualif
     *
     * @param string $qualif
     * @return Interlocuteur
     */
    public function setQualif($qualif) {
        $this->qualif = $qualif;

        return $this;
    }

    /**
     * Get qualif
     *
     * @return string 
     */
    public function getQualif() {
        return $this->qualif;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Interlocuteur
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Interlocuteur
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set familleinterlocuteur
     *
     * @param string $familleinterlocuteur
     * @return Interlocuteur
     */
    public function setFamilleinterlocuteur($familleinterlocuteur) {
        $this->familleinterlocuteur = $familleinterlocuteur;

        return $this;
    }

    /**
     * Get familleinterlocuteur
     *
     * @return string 
     */
    public function getFamilleinterlocuteur() {
        return $this->familleinterlocuteur;
    }

    /**
     * Set datenaissance
     *
     * @param string $datenaissance
     * @return Interlocuteur
     */
    public function setDatenaissance($datenaissance) {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return string 
     */
    public function getDatenaissance() {
        return $this->datenaissance;
    }

    /**
     * Set tel1
     *
     * @param integer $tel1
     * @return Interlocuteur
     */
    public function setTel1($tel1) {
        $this->tel1 = $tel1;

        return $this;
    }

    /**
     * Get tel1
     *
     * @return integer 
     */
    public function getTel1() {
        return $this->tel1;
    }

    /**
     * Set tel2
     *
     * @param integer $tel2
     * @return Interlocuteur
     */
    public function setTel2($tel2) {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get tel2
     *
     * @return integer 
     */
    public function getTel2() {
        return $this->tel2;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Interlocuteur
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set infolibre1
     *
     * @param string $infolibre1
     * @return Interlocuteur
     */
    public function setInfolibre1($infolibre1) {
        $this->infolibre1 = $infolibre1;

        return $this;
    }

    /**
     * Get infolibre1
     *
     * @return string 
     */
    public function getInfolibre1() {
        return $this->infolibre1;
    }

    /**
     * Set infolibre2
     *
     * @param string $infolibre2
     * @return Interlocuteur
     */
    public function setInfolibre2($infolibre2) {
        $this->infolibre2 = $infolibre2;

        return $this;
    }

    /**
     * Get infolibre2
     *
     * @return string 
     */
    public function getInfolibre2() {
        return $this->infolibre2;
    }

    /**
     * Set boollibre1
     *
     * @param string $boollibre1
     * @return Interlocuteur
     */
    public function setBoollibre1($boollibre1) {
        $this->boollibre1 = $boollibre1;

        return $this;
    }

    /**
     * Get boollibre1
     *
     * @return string 
     */
    public function getBoollibre1() {
        return $this->boollibre1;
    }

    /**
     * Set boollibre2
     *
     * @param string $boollibre2
     * @return Interlocuteur
     */
    public function setBoollibre2($boollibre2) {
        $this->boollibre2 = $boollibre2;

        return $this;
    }

    /**
     * Get boollibre2
     *
     * @return string 
     */
    public function getBoollibre2() {
        return $this->boollibre2;
    }

    /**
     * Set datemodif
     *
     * @param \DateTime $datemodif
     * @return Interlocuteur
     */
    public function setDatemodif($datemodif) {
        $this->datemodif = $datemodif;

        return $this;
    }

    /**
     * Get datemodif
     *
     * @return \DateTime 
     */
    public function getDatemodif() {
        return $this->datemodif;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Interlocuteur
     */
    public function setDatecreation($datecreation) {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation() {
        return $this->datecreation;
    }

    /**
     * Set langue
     *
     * @param string $langue
     * @return Interlocuteur
     */
    public function setLangue($langue) {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue() {
        return $this->langue;
    }

    /**
     * Set service
     *
     * @param string $service
     * @return Interlocuteur
     */
    public function setService($service) {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string 
     */
    public function getService() {
        return $this->service;
    }

    /**
     * Set interet
     *
     * @param string $interet
     * @return Interlocuteur
     */
    public function setInteret($interet) {
        $this->interet = $interet;

        return $this;
    }

    /**
     * Get interet
     *
     * @return string 
     */
    public function getInteret() {
        return $this->interet;
    }

    /**
     * Set defaut
     *
     * @param boolean $defaut
     * @return Interlocuteur
     */
    public function setDefaut($defaut) {
        $this->defaut = $defaut;

        return $this;
    }

    /**
     * Get defaut
     *
     * @return boolean 
     */
    public function getDefaut() {
        return $this->defaut;
    }

    /**
     * Set codeimport
     *
     * @param string $codeimport
     * @return Interlocuteur
     */
    public function setCodeimport($codeimport) {
        $this->codeimport = $codeimport;

        return $this;
    }

    /**
     * Get codeimport
     *
     * @return string 
     */
    public function getCodeimport() {
        return $this->codeimport;
    }

    /**
     * Set codecontactimport
     *
     * @param string $codecontactimport
     * @return Interlocuteur
     */
    public function setCodecontactimport($codecontactimport) {
        $this->codecontactimport = $codecontactimport;

        return $this;
    }

    /**
     * Get codecontactimport
     *
     * @return string 
     */
    public function getCodecontactimport() {
        return $this->codecontactimport;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Interlocuteur
     */
    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire() {
        return $this->commentaire;
    }

    /**
     * Set tel3
     *
     * @param integer $tel3
     * @return Interlocuteur
     */
    public function setTel3($tel3) {
        $this->tel3 = $tel3;

        return $this;
    }

    /**
     * Get tel3
     *
     * @return integer 
     */
    public function getTel3() {
        return $this->tel3;
    }

    /**
     * Set tel4
     *
     * @param integer $tel4
     * @return Interlocuteur
     */
    public function setTel4($tel4) {
        $this->tel4 = $tel4;

        return $this;
    }

    /**
     * Get tel4
     *
     * @return integer 
     */
    public function getTel4() {
        return $this->tel4;
    }

    /**
     * Set hobbies
     *
     * @param string $hobbies
     * @return Interlocuteur
     */
    public function setHobbies($hobbies) {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * Get hobbies
     *
     * @return string 
     */
    public function getHobbies() {
        return $this->hobbies;
    }

    /**
     * Set export
     *
     * @param string $export
     * @return Interlocuteur
     */
    public function setExport($export) {
        $this->export = $export;

        return $this;
    }

    /**
     * Get export
     *
     * @return string 
     */
    public function getExport() {
        return $this->export;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Interlocuteur
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return Interlocuteur
     */
    public function setAdresse2($adresse2) {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2() {
        return $this->adresse2;
    }

    /**
     * Set adresse3
     *
     * @param string $adresse3
     * @return Interlocuteur
     */
    public function setAdresse3($adresse3) {
        $this->adresse3 = $adresse3;

        return $this;
    }

    /**
     * Get adresse3
     *
     * @return string 
     */
    public function getAdresse3() {
        return $this->adresse3;
    }

    /**
     * Set adresse4
     *
     * @param string $adresse4
     * @return Interlocuteur
     */
    public function setAdresse4($adresse4) {
        $this->adresse4 = $adresse4;

        return $this;
    }

    /**
     * Get adresse4
     *
     * @return string 
     */
    public function getAdresse4() {
        return $this->adresse4;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Interlocuteur
     */
    public function setCp($cp) {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp() {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Interlocuteur
     */
    public function setVille($ville) {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille() {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Interlocuteur
     */
    public function setPays($pays) {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays() {
        return $this->pays;
    }

    /**
     * Set inactif
     *
     * @param boolean $inactif
     * @return Interlocuteur
     */
    public function setInactif($inactif) {
        $this->inactif = $inactif;

        return $this;
    }

    /**
     * Get inactif
     *
     * @return boolean 
     */
    public function getInactif() {
        return $this->inactif;
    }

    /**
     * Set vendeur
     *
     * @param string $vendeur
     * @return Interlocuteur
     */
    public function setVendeur($vendeur) {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * Get vendeur
     *
     * @return string 
     */
    public function getVendeur() {
        return $this->vendeur;
    }

    /**
     * Set email2
     *
     * @param string $email2
     * @return Interlocuteur
     */
    public function setEmail2($email2) {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get email2
     *
     * @return string 
     */
    public function getEmail2() {
        return $this->email2;
    }

    /**
     * Get email3
     *
     * @return string 
     */
    public function getEmail3() {
        return $this->email3;
    }

    /**
     * Set email3
     *
     * @param string $email3
     * @return Interlocuteur
     */
    public function setEmail3($email3) {
        $this->email3 = $email3;

        return $this;
    }

    /**
     * Get email4
     *
     * @return string 
     */
    public function getEmail4() {
        return $this->email4;
    }

    /**
     * Set email4
     *
     * @param string $email4
     * @return Interlocuteur
     */
    public function setEmail4($email4) {
        $this->email4 = $email4;

        return $this;
    }

    /**
     * Get email5
     *
     * @return string 
     */
    public function getEmail5() {
        return $this->email5;
    }

    /**
     * Set email5
     *
     * @param string $email5
     * @return Interlocuteur
     */
    public function setEmail5($email5) {
        $this->email5 = $email5;

        return $this;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Interlocuteur
     */
    public function setLatitute($latitude) {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * Set Longitude
     *
     * @param string $longitude
     * @return Interlocuteur
     */
    public function setLongitude($longitude) {
        $this->longitute = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude() {
        return $this->latitude;
    }

    /**
     * Set pasemailing
     *
     * @param boolean $pasemailing 
     * @return Interlocuteur
     */
    public function setPasemailing($pasemailing) {
        $this->pasemailing = $pasemailing;

        return $this;
    }

    /**
     * Get pasemailing
     *
     * @return boolean 
     */
    public function getPasemailing() {
        return $this->pasemailing;
    }

    /**
     * Set passms
     *
     * @param boolean $passms
     * @return Interlocuteur
     */
    public function setPassms($passms) {
        $this->passms = $passms;

        return $this;
    }

    /**
     * Get passms
     *
     * @return boolean 
     */
    public function getPassms() {
        return $this->passms;
    }

    /**
     * Set boollibre3
     *
     * @param boolean $boollibre3
     * @return Interlocuteur
     */
    public function setBoollibre3($boollibre3) {
        $this->boollibre3 = $boollibre3;

        return $this;
    }

    /**
     * Get boollibre3
     *
     * @return boolean 
     */
    public function getBoollibre3() {
        return $this->boollibre3;
    }

    /**
     * Set boollibre4
     *
     * @param boolean $boollibre4
     * @return Interlocuteur
     */
    public function setBoollibre4($boollibre4) {
        $this->boollibre4 = $boollibre4;

        return $this;
    }

    /**
     * Get boollibre4
     *
     * @return boolean 
     */
    public function getBoollibre4() {
        return $this->boollibre4;
    }

    /**
     * Set boollibre5
     *
     * @param boolean $boollibre5
     * @return Interlocuteur
     */
    public function setBoollibre5($boollibre5) {
        $this->boollibre5 = $boollibre5;

        return $this;
    }

    /**
     * Get boollibre5
     *
     * @return boolean 
     */
    public function getBoollibre5() {
        return $this->boollibre5;
    }

}
