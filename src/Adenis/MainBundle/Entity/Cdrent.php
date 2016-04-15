<?php

namespace Adenis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cdrent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Adenis\MainBundle\Entity\CdrentRepository")
 */
class Cdrent {

    /**
     * @var integer
     *
     * @ORM\Column(name="cdrid", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="calldate", type="datetime")
     */
    private $calldate;

    /**
     * @var string
     *
     * @ORM\Column(name="clid", type="string", length=80)
     */
    private $clid;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=80)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="dst", type="string", length=80)
     */
    private $dst;

    /**
     * @var string
     *
     * @ORM\Column(name="dcontext", type="string", length=80)
     */
    private $dcontext;

    /**
     * @var string
     *
     * @ORM\Column(name="channel", type="string", length=80)
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="dstchannel", type="string", length=80)
     */
    private $dstchannel;

    /**
     * @var string
     *
     * @ORM\Column(name="lastapp", type="string", length=80)
     */
    private $lastapp;

    /**
     * @var string
     *
     * @ORM\Column(name="lastdata", type="string", length=80)
     */
    private $lastdata;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var integer
     *
     * @ORM\Column(name="billsec", type="integer")
     */
    private $billsec;

    /**
     * @var string
     *
     * @ORM\Column(name="disposition", type="string", length=45)
     */
    private $disposition;

    /**
     * @var integer
     *
     * @ORM\Column(name="amaflags", type="integer")
     */
    private $amaflags;

    /**
     * @var string
     *
     * @ORM\Column(name="accountcode", type="string", length=20)
     */
    private $accountcode;

    /**
     * @var string
     *
     * @ORM\Column(name="uniqueid", type="string", length=32)
     */
    private $uniqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="userfield", type="string", length=255)
     */
    private $userfield;

    /**
     * @var string
     *
     * @ORM\Column(name="sequence", type="string", length=32)
     */
    private $sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedid", type="string", length=32)
     */
    private $linkedid;

    /**
     * @var string
     *
     * @ORM\Column(name="astcause", type="string", length=80)
     */
    private $astcause;

    /**
     * @var string
     *
     * @ORM\Column(name="techcause", type="string", length=80)
     */
    private $techcause;

    /**
     * @var string
     *
     * @ORM\Column(name="trunkname", type="string", length=80)
     */
    private $trunkname;

    /**
     * @var string
     *
     * @ORM\Column(name="prefix", type="string", length=60)
     */
    private $prefix;

    /**
     * @var string
     *
     * @ORM\Column(name="line_type", type="string", length=30)
     */
    private $lineType;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=30)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=80)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="selling_rate", type="string", length=80)
     */
    private $sellingRate;

    /**
     * @var string
     *
     * @ORM\Column(name="connection_charge", type="string", length=10)
     */
    private $connectionCharge;

    /**
     * @var string
     *
     * @ORM\Column(name="buying_rate", type="string", length=20)
     */
    private $buyingRate;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="string", length=20)
     */
    private $cost;

    /**
     * @var string
     *
     * @ORM\Column(name="authorization", type="string", length=30)
     */
    private $authorization;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codecontact", type="string", length=15, nullable=true)
     */
    private $codecontact;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomcontact", type="string", length=50, nullable=true)
     */
    private $nomcontact;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     * @return Cdrent
     */
    public function setCalldate($calldate) {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * Get calldate
     *
     * @return \DateTime 
     */
    public function getCalldate() {
        return $this->calldate;
    }

    /**
     * Set clid
     *
     * @param string $clid
     * @return Cdrent
     */
    public function setClid($clid) {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Get clid
     *
     * @return string 
     */
    public function getClid() {
        return $this->clid;
    }

    /**
     * Set src
     *
     * @param string $src
     * @return Cdrent
     */
    public function setSrc($src) {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string 
     */
    public function getSrc() {
        return $this->src;
    }

    /**
     * Set dst
     *
     * @param string $dst
     * @return Cdrent
     */
    public function setDst($dst) {
        $this->dst = $dst;

        return $this;
    }

    /**
     * Get dst
     *
     * @return string 
     */
    public function getDst() {
        return $this->dst;
    }

    /**
     * Set dcontext
     *
     * @param string $dcontext
     * @return Cdrent
     */
    public function setDcontext($dcontext) {
        $this->dcontext = $dcontext;

        return $this;
    }

    /**
     * Get dcontext
     *
     * @return string 
     */
    public function getDcontext() {
        return $this->dcontext;
    }

    /**
     * Set channel
     *
     * @param string $channel
     * @return Cdrent
     */
    public function setChannel($channel) {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string 
     */
    public function getChannel() {
        return $this->channel;
    }

    /**
     * Set dstchannel
     *
     * @param string $dstchannel
     * @return Cdrent
     */
    public function setDstchannel($dstchannel) {
        $this->dstchannel = $dstchannel;

        return $this;
    }

    /**
     * Get dstchannel
     *
     * @return string 
     */
    public function getDstchannel() {
        return $this->dstchannel;
    }

    /**
     * Set lastapp
     *
     * @param string $lastapp
     * @return Cdrent
     */
    public function setLastapp($lastapp) {
        $this->lastapp = $lastapp;

        return $this;
    }

    /**
     * Get lastapp
     *
     * @return string 
     */
    public function getLastapp() {
        return $this->lastapp;
    }

    /**
     * Set lastdata
     *
     * @param string $lastdata
     * @return Cdrent
     */
    public function setLastdata($lastdata) {
        $this->lastdata = $lastdata;

        return $this;
    }

    /**
     * Get lastdata
     *
     * @return string 
     */
    public function getLastdata() {
        return $this->lastdata;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Cdrent
     */
    public function setDuration($duration) {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Set billsec
     *
     * @param integer $billsec
     * @return Cdrent
     */
    public function setBillsec($billsec) {
        $this->billsec = $billsec;

        return $this;
    }

    /**
     * Get billsec
     *
     * @return integer 
     */
    public function getBillsec() {
        return $this->billsec;
    }

    /**
     * Set disposition
     *
     * @param string $disposition
     * @return Cdrent
     */
    public function setDisposition($disposition) {
        $this->disposition = $disposition;

        return $this;
    }

    /**
     * Get disposition
     *
     * @return string 
     */
    public function getDisposition() {
        return $this->disposition;
    }

    /**
     * Set amaflags
     *
     * @param integer $amaflags
     * @return Cdrent
     */
    public function setAmaflags($amaflags) {
        $this->amaflags = $amaflags;

        return $this;
    }

    /**
     * Get amaflags
     *
     * @return integer 
     */
    public function getAmaflags() {
        return $this->amaflags;
    }

    /**
     * Set accountcode
     *
     * @param string $accountcode
     * @return Cdrent
     */
    public function setAccountcode($accountcode) {
        $this->accountcode = $accountcode;

        return $this;
    }

    /**
     * Get accountcode
     *
     * @return string 
     */
    public function getAccountcode() {
        return $this->accountcode;
    }

    /**
     * Set uniqueid
     *
     * @param string $uniqueid
     * @return Cdrent
     */
    public function setUniqueid($uniqueid) {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    /**
     * Get uniqueid
     *
     * @return string 
     */
    public function getUniqueid() {
        return $this->uniqueid;
    }

    /**
     * Set userfield
     *
     * @param string $userfield
     * @return Cdrent
     */
    public function setUserfield($userfield) {
        $this->userfield = $userfield;

        return $this;
    }

    /**
     * Get userfield
     *
     * @return string 
     */
    public function getUserfield() {
        return $this->userfield;
    }

    /**
     * Set sequence
     *
     * @param string $sequence
     * @return Cdrent
     */
    public function setSequence($sequence) {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return string 
     */
    public function getSequence() {
        return $this->sequence;
    }

    /**
     * Set linkedid
     *
     * @param string $linkedid
     * @return Cdrent
     */
    public function setLinkedid($linkedid) {
        $this->linkedid = $linkedid;

        return $this;
    }

    /**
     * Get linkedid
     *
     * @return string 
     */
    public function getLinkedid() {
        return $this->linkedid;
    }

    /**
     * Set astcause
     *
     * @param string $astcause
     * @return Cdrent
     */
    public function setAstcause($astcause) {
        $this->astcause = $astcause;

        return $this;
    }

    /**
     * Get astcause
     *
     * @return string 
     */
    public function getAstcause() {
        return $this->astcause;
    }

    /**
     * Set techcause
     *
     * @param string $techcause
     * @return Cdrent
     */
    public function setTechcause($techcause) {
        $this->techcause = $techcause;

        return $this;
    }

    /**
     * Get techcause
     *
     * @return string 
     */
    public function getTechcause() {
        return $this->techcause;
    }

    /**
     * Set trunkname
     *
     * @param string $trunkname
     * @return Cdrent
     */
    public function setTrunkname($trunkname) {
        $this->trunkname = $trunkname;

        return $this;
    }

    /**
     * Get trunkname
     *
     * @return string 
     */
    public function getTrunkname() {
        return $this->trunkname;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     * @return Cdrent
     */
    public function setPrefix($prefix) {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * Set lineType
     *
     * @param string $lineType
     * @return Cdrent
     */
    public function setLineType($lineType) {
        $this->lineType = $lineType;

        return $this;
    }

    /**
     * Get lineType
     *
     * @return string 
     */
    public function getLineType() {
        return $this->lineType;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Cdrent
     */
    public function setRegion($region) {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion() {
        return $this->region;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Cdrent
     */
    public function setDestination($destination) {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * Set sellingRate
     *
     * @param string $sellingRate
     * @return Cdrent
     */
    public function setSellingRate($sellingRate) {
        $this->sellingRate = $sellingRate;

        return $this;
    }

    /**
     * Get sellingRate
     *
     * @return string 
     */
    public function getSellingRate() {
        return $this->sellingRate;
    }

    /**
     * Set connectionCharge
     *
     * @param string $connectionCharge
     * @return Cdrent
     */
    public function setConnectionCharge($connectionCharge) {
        $this->connectionCharge = $connectionCharge;

        return $this;
    }

    /**
     * Get connectionCharge
     *
     * @return string 
     */
    public function getConnectionCharge() {
        return $this->connectionCharge;
    }

    /**
     * Set buyingRate
     *
     * @param string $buyingRate
     * @return Cdrent
     */
    public function setBuyingRate($buyingRate) {
        $this->buyingRate = $buyingRate;

        return $this;
    }

    /**
     * Get buyingRate
     *
     * @return string 
     */
    public function getBuyingRate() {
        return $this->buyingRate;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return Cdrent
     */
    public function setCost($cost) {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost() {
        return $this->cost;
    }

    /**
     * Set authorization
     *
     * @param string $authorization
     * @return Cdrent
     */
    public function setAuthorization($authorization) {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * Get authorization
     *
     * @return string 
     */
    public function getAuthorization() {
        return $this->authorization;
    }
    
    
    /**
     * Set codecontact
     *
     * @param string $codecontact
     * @return Cdrent
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
     * Set nomcontact
     *
     * @param string $nomcontact
     * @return Cdrent
     */
    public function setNomcontact($nomcontact) {
        $this->nomcontact = $nomcontact;

        return $this;
    }

    /**
     * Get nomcontact
     *
     * @return string 
     */
    public function getNomcontact() {
        return $this->nomcontact;
    }

}
