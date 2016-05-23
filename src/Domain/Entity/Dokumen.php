<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 06/05/2016
 * Time: 12:40
 */

namespace Yanna\bts\Domain\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Dokumen
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDokumenRepository")
 * @package Yanna\bts\Domain\Entity
 * @Table(name="dokumen")
 * @HasLifecycleCallbacks
 */
class Dokumen
{

    /**
     * @Id
     * @Column(type="integer",nullable=false)
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    private $username;

    /**
     * @Column(type="text",name="site_location",nullable=false)
     * @var string
     */
    private $siteLocation;

    /**
     * @Column(type="text",name="gps_coordinate",nullable=false)
     * @var string
     */
    private $gpsCoordinate;

    /**
     * @Column(type="text",name="shelter_view",nullable=false)
     * @var string
     */
    private $shelterView;

    /**
     * @Column(type="text",name="overview_inside",nullable=false)
     * @var string
     */
    private $overviewInside;

    /**
     * @Column(type="text",name="fep_indoor",nullable=false)
     * @var string
     */
    private $fepIndoor;

    /**
     * @Column(type="text",name="fep_outdoor",nullabla=false)
     * @var string
     */
    private $fepOutdoor;

    /**
     * @Column(type="text",name="feeder_indoor",nullable=false)
     * @var string
     */
    private $feederIndoor;

    /**
     * @Column(type="text",name="feeder_breeding",nullable=false)
     * @var string
     */
    private $feederBreeding;

    /**
     * @Column(type="text",name="internal_grounding",nullable=false)
     * @var string
     */
    private $internalGrounding;

    /**
     * @Column(type="text",name="external_gb",nullable=false)
     * @var string
     */
    private $externalGb;

    /**
     * @Column(type="text",name="alarm_box",nullable=false)
     * @var string
     */
    private $alarmBox;

    /**
     * @Column(type="text",name="acpdb_internal",nullable=false)
     * @var string
     */
    private $acpdbInternal;

    /**
     * @Column(type="text",name="mcb_at",nullable=false)
     * @var string
     */
    private $mcbAt;

    /**
     * @Column(type="text",name="rectifier_cabinet",nullable=false)
     * @var string
     */
    private $rectifierCabinet;

    /**
     * @Column(type="text",name="mcb_at_rectifier",nullable=false)
     * @var string
     */
    private $mcbAtRectifier;

    /**
     * @Column(type="text",name="rack",nullable=false)
     * @var string
     */
    private $rack;

    /**
     * @Column(type="text",name="antenna_sector_a",nullable=false)
     * @var string
     */
    private $antennaMechanicalSectorA;

    /**
     * @Column(type="text",name="antenna_sector_b",nullable=false)
     * @var string
     */
    private $antennaMechanicalSectorB;

    /**
     * @Column(type="text",name="antenna_sector_c",nullable=false)
     * @var string
     */
    private $antennaMechanicalSectorC;

    /**
     * @Column(type="text",name="azimuth_sector_a",nullable=false)
     * @var string
     */
    private $azimuthSectorA;

    /**
     * @Column(type="text",name="azimuth_sector_b",nullable=false)
     * @var string
     */
    private $azimuthSectorB;

    /**
     * @Column(type="text",name="azimuth_sector_c",nullable=false)
     * @var string
     */
    private $azimuthSectorC;

    /**
     * @Column(type="text",name="labelling_of_cpri",nullable=false)
     * @var string
     */
    private $labellingOfCpri;

    /**
     * @Column(type="text",name="connection_sector_a",nullable=false)
     * @var string
     */
    private $connectionOfCpriSectorA;

    /**
     * @Column(type="text",name="connection_sector_b",nullable=false)
     * @var string
     */
    private $connectionOfCpriSectorB;

    /**
     * @Column(type="text",name="connection_sector_c",nullable=false)
     * @var string
     */
    private $connectionOfCpriSectorC;

    /**
     * @Column(type="text",name="grounding_cable",nullable=false)
     * @var string
     */
    private $groundingCable;

    public static function create($username,$siteLocation,$gpsCoordinate,$shelterView,$overviewInside,$fepIndoor,$fepOutdoor,$feederIndoor,$feederBreeding,$internalGrounding,$externalGb,$alarmBox,$acpdbInternal,$mcbAt,$rectifierCabinet,$mcbAtRectifier,$rack,$antennaMechanicalSectorA,$antennaMechanicalSectorB,$antennaMechanicalSectorC,$azimuthSectorA,$azimuthSectorB,$azimuthSectorC,$labellingOfCpri,$connectionOfCpriSectorA,$connectionOfCpriSectorB,$connectionOfCpriSectorC,$groundingCable)
    {

        $dokumenInfo = new Dokumen();

        $dokumenInfo->setUsername($username);
        $dokumenInfo->setSiteLocation($siteLocation);
        $dokumenInfo->setGpsCoordinate($gpsCoordinate);
        $dokumenInfo->setShelterView($shelterView);
        $dokumenInfo->setOverviewInside($overviewInside);
        $dokumenInfo->setFepIndoor($fepIndoor);
        $dokumenInfo->setFepOutdoor($fepOutdoor);
        $dokumenInfo->setFeederIndoor($feederIndoor);
        $dokumenInfo->setFeederBreeding($feederBreeding);
        $dokumenInfo->setInternalGrounding($internalGrounding);
        $dokumenInfo->setExternalGb($externalGb);
        $dokumenInfo->setAlarmBox($alarmBox);
        $dokumenInfo->setAcpdbInternal($acpdbInternal);
        $dokumenInfo->setMcbAt($mcbAt);
        $dokumenInfo->setRectifierCabinet($rectifierCabinet);
        $dokumenInfo->setMcbAtRectifier($mcbAtRectifier);
        $dokumenInfo->setRack($rack);
        $dokumenInfo->setAntennaMechanicalSectorA($antennaMechanicalSectorA);
        $dokumenInfo->setAntennaMechanicalSectorB($antennaMechanicalSectorB);
        $dokumenInfo->setAntennaMechanicalSectorC($antennaMechanicalSectorC);
        $dokumenInfo->setAzimuthSectorA($azimuthSectorA);
        $dokumenInfo->setAzimuthSectorB($azimuthSectorB);
        $dokumenInfo->setAzimuthSectorC($azimuthSectorC);
        $dokumenInfo->setLabellingOfCpri($labellingOfCpri);
        $dokumenInfo->setConnectionOfCpriSectorA($connectionOfCpriSectorA);
        $dokumenInfo->setConnectionOfCpriSectorB($connectionOfCpriSectorB);
        $dokumenInfo->setConnectionOfCpriSectorC($connectionOfCpriSectorC);
        $dokumenInfo->setGroundingCable($groundingCable);

        


    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getSiteLocation()
    {
        return $this->siteLocation;
    }

    public function setSiteLocation($siteLocation)
    {
        $this->siteLocation = $siteLocation;
    }

    public function getGpsCoordinate()
    {
        return $this->gpsCoordinate;
    }

    public function setGpsCoordinate($gpsCoordinate)
    {
        $this->gpsCoordinate = $gpsCoordinate;
    }

    public function getShelterView()
    {
        return $this->shelterView;
    }

    public function setShelterView($shelterView)
    {
        $this->shelterView = $shelterView;
    }

    public function getOverviewInside()
    {
        return $this->overviewInside;
    }

    public function setOverviewInside($overviewInside)
    {
        $this->overviewInside = $overviewInside;
    }

    public function getFepIndoor()
    {
        return $this->fepIndoor;
    }

    public function setFepIndoor($fepIndoor)
    {
        $this->fepIndoor = $fepIndoor;
    }

    public function getFepOutdoor()
    {
        return $this->fepOutdoor;
    }

    public function setFepOutdoor($fepOutdoor)
    {
        $this->fepOutdoor = $fepOutdoor;
    }

    public function getFeederIndoor()
    {
        return $this->feederIndoor;
    }

    public function setFeederIndoor($feederIndoor)
    {
        $this->feederIndoor = $feederIndoor;
    }

    public function getFeederBreeding()
    {
        return $this->feederBreeding;
    }

    public function setFeederBreeding($feederBreeding)
    {
        $this->feederBreeding = $feederBreeding;
    }

    public function getInternalGrounding()
    {
        return $this->internalGrounding;
    }

    public function setInternalGrounding($internalGrounding)
    {
        $this->internalGrounding = $internalGrounding;
    }

    public function getExternalGb()
    {
        return $this->externalGb;
    }

    public function setExternalGb($externalGb)
    {
        $this->externalGb = $externalGb;
    }

    public function getAlarmBox()
    {
        return $this->alarmBox;
    }

    public function setAlarmBox($alarmBox)
    {
        $this->alarmBox = $alarmBox;
    }

    public function getAcpdbInternal()
    {
        return $this->acpdbInternal;
    }

    public function setAcpdbInternal($acpdbInternal)
    {
        $this->acpdbInternal = $acpdbInternal;
    }

    public function getMcbAt()
    {
        return $this->mcbAt;
    }

    public function setMcbAt($mcbAt)
    {
        $this->mcbAt = $mcbAt;
    }

    public function getRectifierCabinet()
    {
        return $this->rectifierCabinet;
    }

    public function setRectifierCabinet($rectifierCabinet)
    {
        $this->rectifierCabinet = $rectifierCabinet;
    }

    public function getMcbAtRectifier()
    {
        return $this->mcbAtRectifier;
    }

    public function setMcbAtRectifier($mcbAtRectifier)
    {
        $this->mcbAtRectifier = $mcbAtRectifier;
    }

    public function getRack()
    {
        return $this->rack;
    }

    public function setRack($rack)
    {
        $this->rack = $rack;
    }

    public function getAntennaMechanicalSectorA()
    {
        return $this->antennaMechanicalSectorA;
    }

    public function setAntennaMechanicalSectorA($antennaMechanicalSectorA)
    {
        $this->antennaMechanicalSectorA = $antennaMechanicalSectorA;
    }

    public function getAntennaMechanicalSectorB()
    {
        return $this->antennaMechanicalSectorB;
    }

    public function setAntennaMechanicalSectorB($antennaMechanicalSectorB)
    {
        $this->antennaMechanicalSectorB = $antennaMechanicalSectorB;
    }

    public function getAntennaMechanicalSectorC()
    {
        return $this->antennaMechanicalSectorC;
    }

    public function setAntennaMechanicalSectorC($antennaMechanicalSectorC)
    {
        $this->antennaMechanicalSectorC = $antennaMechanicalSectorC;
    }

    public function getAzimuthSectorA()
    {
        return $this->azimuthSectorA;
    }

    public function setAzimuthSectorA($azimuthSectorA)
    {
        $this->azimuthSectorA = $azimuthSectorA;
    }

    public function getAzimuthSectorB()
    {
        return $this->azimuthSectorB;
    }

    public function setAzimuthSectorB($azimuthSectorB)
    {
        $this->azimuthSectorB = $azimuthSectorB;
    }

    public function getAzimuthSectorC()
    {
        return $this->azimuthSectorC;
    }

    public function setAzimuthSectorC($azimuthSectorC)
    {
        $this->azimuthSectorC = $azimuthSectorC;
    }

    public function getLabellingOfCpri()
    {
        return $this->labellingOfCpri;
    }

    public function setLabellingOfCpri($labellingOfCpri)
    {
        $this->labellingOfCpri = $labellingOfCpri;
    }

    public function getConnectionOfCpriSectorA()
    {
        return $this->connectionOfCpriSectorA;
    }

    public function setConnectionOfCpriSectorA($connectionOfCpriSectorA)
    {
        $this->connectionOfCpriSectorA = $connectionOfCpriSectorA;
    }

    public function getConnectionOfCpriSectorB()
    {
        return $this->connectionOfCpriSectorB;
    }

    public function setConnectionOfCpriSectorB($connectionOfCpriSectorB)
    {
        $this->connectionOfCpriSectorB = $connectionOfCpriSectorB;
    }

    public function getConnectionOfCpriSectorC()
    {
        return $this->connectionOfCpriSectorC;
    }

    public function setConnectionOfCpriSectorC($connectionOfCpriSectorC)
    {
        $this->connectionOfCpriSectorC = $connectionOfCpriSectorC;
    }

    public function getGroundingCable()
    {
        return $this->groundingCable;
    }

    public function setGroundingCable($groundingCable)
    {
        $this->groundingCable = $groundingCable;
    }

}