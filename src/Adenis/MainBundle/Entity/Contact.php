<?php

namespace Adenis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PDO;

/**
 * Contact
 */
class Contact{

    //atributes
    private $code;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;
    private $pays;
    private $tel1;
    private $tel2;
    private $tel3;
    private $tel4;
    private $email;
    private $adresse2;
    private $adresse3;
    private $adresse4;
    private $statistics;

    /**
     * Set code
     *
     * @param string $code
     * @return Contact
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
     * Set nom
     *
     * @param string $nom
     * @return Contact
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
     * Set adresse
     *
     * @param string $adresse
     * @return Contact
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
     * Set cp
     *
     * @param string $cp
     * @return Contact
     */
    public function setCp($cp) {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp() {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Contact
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
     * @return Contact
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
     * Set tel1
     *
     * @param string $tel1
     * @return Contact
     */
    public function setTel1($tel1) {
        $this->tel1 = $tel1;

        return $this;
    }

    /**
     * Get tel1
     *
     * @return string 
     */
    public function getTel1() {
        return $this->tel1;
    }

    /**
     * Set tel2
     *
     * @param string $tel2
     * @return Contact
     */
    public function setTel2($tel2) {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get tel2
     *
     * @return string 
     */
    public function getTel2() {
        return $this->tel2;
    }

    /**
     * Set tel3
     *
     * @param string $tel3
     * @return Contact
     */
    public function setTel3($tel3) {
        $this->tel3 = $tel3;

        return $this;
    }

    /**
     * Get tel3
     *
     * @return string 
     */
    public function getTel3() {
        return $this->tel3;
    }

    /**
     * Set tel4
     *
     * @param string $tel4
     * @return Contact
     */
    public function setTel4($tel4) {
        $this->tel4 = $tel4;

        return $this;
    }

    /**
     * Get tel4
     *
     * @return string 
     */
    public function getTel4() {
        return $this->tel4;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
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
     * Set adresse2
     *
     * @param string $adresse2
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set statistics
     *
     * @param string statistics
     * @return Contact
     */
    public function setStatistics($statistics) {
        $this->statistics = $statistics;

        return $this;
    }

    /**
     * Get statistics
     *
     * @return string 
     */
    public function getStatistics() {
        return $this->statistics;
    }

}
