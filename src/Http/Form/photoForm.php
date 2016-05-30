<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 07/05/2016
 * Time: 17:41
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
class photoForm extends AbstractType {

    /**
     * @var string
     */
    private $username;

    /**
     * @var UploadedFile
     */
    private $siteLocation;

    /**
     * @var UploadedFile
     */
    private $gpsCoordinate;

    /**
     * @var UploadedFile
     */
    private $shelterView;

    /**
     * @var UploadedFile
     */
    private $overviewInside;

    /**
     * @var UploadedFile
     */
    private $fepIndoor;

    /**
     * @var UploadedFile
     */
    private $fepOutdoor;

    /**
     * @var UploadedFile
     */
    private $feederIndoor;

    /**
     * @var UploadedFile
     */
    private $feederBreeding;

    /**
     * @var UploadedFile
     */
    private $internalGrounding;

    /**
     * @var UploadedFile
     */
    private $externalGb;

    /**
     * @var UploadedFile
     */
    private $alarmBox;

    /**
     * @var UploadedFile
     */
    private $acpdbInternal;

    /**
     * @var UploadedFile
     */
    private $mcbAt;

    /**
     * @var UploadedFile
     */
    private $rectifierCabinet;

    /**
     * @var UploadedFile
     */
    private $mcbAtRectifier;

    /**
     * @var UploadedFile
     */
    private $rack;

    /**
     * @var UploadedFile
     */
    private $antennaMechanicalSectorA;

    /**
     * @var UploadedFile
     */
    private $antennaMechanicalSectorB;

    /**
     * @var UploadedFile
     */
    private $antenaMechanicalSectorC;

    /**
     * @var UploadedFile
     */
    private $azimuthSectorA;

    /**
     * @var UploadedFile
     */
    private $azimuthSectorB;

    /**
     * @var UploadedFile
     */
    private $azimuthSectorC;

    /**
     * @var UploadedFile
     */
    private $labellingOfCpri;

    /**
     * @var UploadedFile
     */
    private $connectionOfCpriSectorA;

    /**
     * @var UploadedFile
     */
    private $connectionOfCpriSectorB;

    /**
     * @var UploadedFile
     */
    private $connectionOfCpriSectorC;

    /**
     * @var UploadedFile
     */
    private $groundingCable;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'username',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'input username','required'=>'required']
            ]
        )->add(
            'siteLocation',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class' => 'form-control','required'=>'required']
            ]
        )->add(
            'gpsCoordinate',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                      'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'shelterView',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                      'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'overviewInside',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class' => 'form-control','required' => 'required']
            ]
        )->add(
            'fepIndoor',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class' => 'form-control','required' => 'required']
            ]
        )->add(
            'fepOutdoor',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'feederIndoor',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'feederBreeding',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',
                    ])
                ],
                'attr' => ['class'=>'form-control','required' => 'required']
            ]
        )->add(
            'internalGrounding',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class' => 'form-control','required'=>'required']
            ]
        )->add(
            'externalGb',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class' => 'form-control','required'=>'required']
            ]
        )->add(
            'alarmBox',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr'=>['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'acpdbInternal',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'mcbAt',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'rectifierCabinet',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'mcbAtRectifier',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'rack',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'antennaMechanicalSectorA',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'antennaMechanicalSectorB',
            'file',
            [
                'constraints'=>[
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'antennaMechanicalSectorC',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'azimuthSectorA',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class' => 'form-control','required'=>'required']
            ]
        )->add(
            'azimuthSectorB',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]

        )->add(
            'azimuthSectorC',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'labellingOfCpri',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'connectionOfCpriSectorA',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'connectionOfCpriSectorB',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'connectionOFCpriSectorC',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'groundingCable',
            'file',
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Image([
                        'maxSize' => '10m',

                    ])
                ],
                'attr' => ['class'=>'form-control','required'=>'required']
            ]
        )->add(
            'kirim',
            'submit',
            [
                'attr' => ['class' => 'btn btn-primary btn-block btn-flat ']
            ]
        );

    }

    public function getName()
    {
        return 'photo_form';
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @return UploadedFile
     */
    public function getSiteLocation()
    {
        return $this->siteLocation;
    }

    /**
     * @param UploadedFile $siteLocation
     */

    public function setSiteLocation($siteLocation)
    {
        $this->siteLocation = $siteLocation;
    }

    /**
     * @return UploadedFile
     */
    public function getGpsCoordinate()
    {
        return $this->gpsCoordinate;
    }

    /**
     * @param UploadedFile $gpsCoordinate
     */
    public function setGpsCoordinate($gpsCoordinate)
    {
        $this->gpsCoordinate = $gpsCoordinate;
    }

    /**
     * @return UploadedFile
     */
    public function getShelterView()
    {
        return $this->shelterView;
    }

    /**
     * @param UploadedFile $shelterView
     */
    public function setShelterView($shelterView)
    {
        $this->shelterView = $shelterView;
    }

    /**
     * @return UploadedFile
     */
    public function getOverviewInside()
    {
        return $this->overviewInside;
    }

    /**
     * @param UploadedFile $overviewInside
     */
    public function setOverviewInside($overviewInside)
    {
        $this->overviewInside = $overviewInside;
    }

    /**
     * @return UploadedFile
     */
    public function getFepIndoor()
    {
        return $this->fepIndoor;
    }

    /**
     * @param UploadedFile $fepIndoor
     */
    public function setFepIndoor($fepIndoor)
    {
        $this->fepIndoor = $fepIndoor;
    }

    /**
     * @return UploadedFile
     */
    public function getFepOutdoor()
    {
        return $this->fepOutdoor;
    }

    /**
     * @param UploadedFile $fepOutdoor
     */
    public function setFepOutdoor($fepOutdoor)
    {
        $this->fepOutdoor = $fepOutdoor;
    }

    /**
     * @return UploadedFile
     */
    public function getFeederIndoor()
    {
        return $this->feederIndoor;
    }

    /**
     * @param UploadedFile $feederIndoor
     */
    public function setFeederIndoor($feederIndoor)
    {
        $this->feederIndoor = $feederIndoor;
    }

    /**
     * @return UploadedFile
     */
    public function getFeederBreeding()
    {
        return $this->feederBreeding;
    }

    /**
     * @param UploadedFile $feederBreeding
     */
    public function setFeederBreeding($feederBreeding)
    {
        $this->feederBreeding = $feederBreeding;
    }

    /**
     * @return UploadedFile
     */
    public function getInternalGrounding()
    {
        return $this->internalGrounding;
    }

    /**
     * @param UploadedFile $internalGrounding
     */
    public function setInternalGrounding($internalGrounding)
    {
        $this->internalGrounding = $internalGrounding;
    }

    /**
     * @return UploadedFile
     */
    public function getExternalGb()
    {
        return $this->externalGb;
    }

    /**
     * @param UploadedFile $externalGb
     */
    public function setExternalGb($externalGb)
    {
        $this->externalGb = $externalGb;
    }

    /**
     * @return UploadedFile
     */
    public function getAlarmBox()
    {
        return $this->alarmBox;
    }

    /**
     * @param UploadedFile $alarmBox
     */
    public function setAlarmBox($alarmBox)
    {
        $this->alarmBox = $alarmBox;
    }

    /**
     * @return UploadedFile
     */
    public function getAcpdbInternal()
    {
        return $this->acpdbInternal;
    }

    /**
     * @param UploadedFile $acpdbInternal
     */
    public function setAcpdbInternal($acpdbInternal)
    {
        $this->acpdbInternal = $acpdbInternal;
    }

    /**
     * @return UploadedFile
     */
    public function getMcbAt()
    {
        return $this->mcbAt;
    }

    /**
     * @param UploadedFile $mcbAt
     */
    public function setMcbAt($mcbAt)
    {
        $this->mcbAt = $mcbAt;
    }

    /**
     * @return UploadedFile
     */
    public function getRectifierCabinet()
    {
        return $this->rectifierCabinet;
    }

    /**
     * @param UploadedFile $rectifierCabinet
     */
    public function setRectifierCabinet($rectifierCabinet)
    {
        $this->rectifierCabinet = $rectifierCabinet;
    }

    /**
     * @return UploadedFile
     */
    public function getMcbAtRectifier()
    {
        return $this->mcbAtRectifier;
    }

    /**
     * @param UploadedFile $mcbAtRectifier
     */
    public function setMcbAtRectifier($mcbAtRectifier)
    {
        $this->mcbAtRectifier = $mcbAtRectifier;
    }

    /**
     * @return UploadedFile
     */
    public function getRack()
    {
        return $this->rack;
    }

    /**
     * @param UploadedFile $rack
     */
    public function setRack($rack)
    {
        $this->rack = $rack;
    }

    /**
     * @return UploadedFile
     */
    public function getAntennaMechanicalSectorA()
    {
        return $this->antennaMechanicalSectorA;
    }

    /**
     * @param UploadedFile $antennaMechanicalSectorA
     */
    public function setAntennaMechanicalSectorA($antennaMechanicalSectorA)
    {
        $this->antennaMechanicalSectorA = $antennaMechanicalSectorA;
    }

    /**
     * @return UploadedFile
     */
    public function getAntennaMechanicalSectorB()
    {
        return $this->antennaMechanicalSectorB;
    }

    /**
     * @param UploadedFile $antennaMechanicalSectorB
     */
    public function setAntennaMechanicalSectorB($antennaMechanicalSectorB)
    {
        $this->antennaMechanicalSectorB = $antennaMechanicalSectorB;
    }

    /**
     * @return UploadedFile
     */
    public function getAntennaMechanicalSectorC()
    {
        return $this->antenaMechanicalSectorC;
    }

    /**
     * @param UploadedFile $antennaMechanicalSectorC
     */
    public function setAntennaMechanicalSectorC($antennaMechanicalSectorC)
    {
        $this->antenaMechanicalSectorC = $antennaMechanicalSectorC;
    }

    /**
     * @return UploadedFile
     */
    public function getAzimuthSectorA()
    {
        return $this->azimuthSectorA;
    }

    /**
     * @param UploadedFile $azimuthSectorA
     */
    public function setAzimuthSectorA($azimuthSectorA)
    {
        $this->azimuthSectorA = $azimuthSectorA;
    }

    /**
     * @return UploadedFile
     */
    public function getAzimuthSectorB()
    {
        return $this->azimuthSectorB;
    }

    /**
     * @param UploadedFile $azimuthSectorB
     */
    public function setAzimuthSectorB($azimuthSectorB)
    {
        $this->azimuthSectorB = $azimuthSectorB;
    }

    /**
     * @return UploadedFile
     */
    public function getAzimuthSectorC()
    {
        return $this->azimuthSectorC;
    }

    /**
     * @param UploadedFile $azimuthSectorC
     */
    public function setAzimuthSectorC($azimuthSectorC)
    {
        $this->azimuthSectorC = $azimuthSectorC;
    }

    /**
     * @return UploadedFile
     */
    public function getLabellingOfCpri()
    {
        return $this->labellingOfCpri;
    }

    /**
     * @param UploadedFile $labellingOfCpri
     */
    public function setLabellingOfCpri($labellingOfCpri)
    {
        $this->labellingOfCpri = $labellingOfCpri;
    }

    /**
     * @return UploadedFile
     */
    public function getConnectionOfCpriSectorA()
    {
        return $this->connectionOfCpriSectorA;
    }

    /**
     * @param UploadedFile $connectionOfCpriSectorA
     */
    public function setConnectionOfCpriSectorA($connectionOfCpriSectorA)
    {
        $this->connectionOfCpriSectorA = $connectionOfCpriSectorA;
    }

    /**
     * @return UploadedFile
     */
    public function getConnectionOfCpriSectorB()
    {
        return $this->connectionOfCpriSectorB;
    }

    /**
     * @param UploadedFile $connectionOfCpriSectorB
     */
    public function setConnectionOfCpriSectorB($connectionOfCpriSectorB)
    {
        $this->connectionOfCpriSectorB = $connectionOfCpriSectorB;
    }

    /**
     * @return UploadedFile
     */
    public function getConnectionOfCpriSectorC()
    {
        return $this->connectionOfCpriSectorC;
    }

    /**
     * @param UploadedFile $connectionOfCpriSectorC
     */
    public function setConnectionOfCpriSectorC($connectionOfCpriSectorC)
    {
        $this->connectionOfCpriSectorC = $connectionOfCpriSectorC;
    }

    /**
     * @return UploadedFile
     */
    public function getGroundingCable()
    {
        return $this->groundingCable;
    }

    /**
     * @param UploadedFile $groundingCable
     */
    public function setGroundingCable($groundingCable)
    {
        $this->groundingCable = $groundingCable;
    }



}