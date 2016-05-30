<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/04/16
 * Time: 5:06
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class Site
 * @package Yanna\bts\Domain\Entity
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineSiteRepository")
 * @Table(name="sites")
 */
class Site
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    public $id;

    /**
     * @Column(type="integer",nullable=false)
     * @var int
     *
     */
    public $regional;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $poc;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $prodef;

    /**
     * @Column(type="string",name="site_id",length=255,nullable=false)
     * @var string
     */
    public $siteId;

    /**
     * @Column(type="string",name="site_name",length=255,nullable=false)
     * @var string
     */
    public $siteName;

    /**
     * @Column(type="integer",name="tower_id",nullable=false)
     * @var int
     */
    public $towerId;


    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $address;

    /**
     * @Column(type="integer",nullable=false)
     * @var int
     */
    public $fop;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $longitude;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $latitude;

    /**
     * @Column(type="string",name="existing_system",length=255,nullable=false)
     * @var string
     */
    public $existingSystem;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $remark;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    public $stats;




    public static function create($regional,$poc,$prodef,$siteId,$siteName,$towerId,$address,$fop,$longitude,$latitude,$existingSystem,$remark,$stats)
    {
        $siteInfo = new Site();
        $siteInfo->setRegional($regional);
        $siteInfo->setPoc($poc);
        $siteInfo->setProdef($prodef);
        $siteInfo->setSiteId($siteId);
        $siteInfo->setSiteName($siteName);
        $siteInfo->setTowerId($towerId);
        $siteInfo->setAddress($address);
        $siteInfo->setFop($fop);
        $siteInfo->setLongitude($longitude);
        $siteInfo->setLatitude($latitude);
        $siteInfo->setExistingSystem($existingSystem);
        $siteInfo->setRemark($remark);
        $siteInfo->setStats($stats);


        return $siteInfo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRegional()
    {
        return $this->regional;
    }

    public function setRegional($regional)
    {
        $this->regional = $regional;
    }

    public function getPoc()
    {
        return $this->poc;
    }

    public function setPoc($poc)
    {
        $this->poc = $poc;
    }

    public function getProdef()
    {
        return $this->prodef;
    }

    public function setProdef($prodef)
    {
        $this->prodef = $prodef;
    }

    public function getSiteId()
    {
        return $this->siteId;
    }

    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    public function getSiteName()
    {
        return $this->siteName;
    }

    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
    }

    public function getTowerId()
    {
        return $this->towerId;
    }

    public function setTowerId($towerId)
    {
        $this->towerId = $towerId;
    }


    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getFop()
    {
        return $this->fop;
    }

    public function setFop($fop)
    {
        $this->fop = $fop;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getExistingSystem()
    {
        return $this->existingSystem;
    }

    public function setExistingSystem($existingSystem)
    {
        $this->existingSystem = $existingSystem;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    public function getStats()
    {
        return $this->stats;
    }

    public function setStats($stats)
    {
        $this->stats = $stats;
    }





}