<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/04/16
 * Time: 5:37
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;


class siteForm extends AbstractType
{
    private $regional;

    private $poc;

    private $prodef;

    private $siteId;

    private $siteName;

    private $towerId;

    private $towerOwner;

    private $address;

    private $fop;

    private $longitude;

    private $latitude;

    private $existingSystem;

    private $remark;

    private $stats;

    private $subcont;

    private $spv;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'regional',
            'choice',
            [
                'constraints'=>new Assert\NotBlank(),
                'choice_list' => new ChoiceList(
                    ['0','1','2'],['Bali','Lombok','Jawa']
                ),
                'placeholder'=> 'choose Regional',
                'empty_data' => '0',
                'label'=>false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'poc',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input Cluster (ex:MATARAM)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'prodef',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input prodef (ex:SW/6971)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'site_id',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input site id (ex:B661)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'site_name',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input Site Name (ex:B661_SAJAN UTARA LOMTIM)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]
        )->add(
            'tower_id',
            'integer',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input Tower Id (ex:B341)','required'=>'required'],
                'label_attr' => ['class'=>'field-label']
            ]
//        )->add(
//            'tower_owner',
//            'text',
//            [
//                'constraints'=>new Assert\NotBlank(),
//                'label' => false,
//                'attr' => ['class'=>'form-control','placeholder'=>'Input tower owner (ex:XL)','required'=>'required'],
//                'label_attr'=> ['class'=>'field-label']
//            ]
        )->add(
            'address',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input address (ex:JL.SELONGKEN RT.02 KEC.SEMBALUN KAB.LOMBOK TIMUR,NTB)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'fop',
            'choice',
            [
                'constraints'=>new Assert\NotBlank(),
                'choice_list' => new ChoiceList(
                    ['0','1','2','3','4'],['NURUL AMINULLAH (+6281933155295)','M MAISUN (+6281915940909)','JAKA SUTARJA (+6281806751538)','HERRY SETYAWAN PUTRA (+62817369001)','GREGORIUS ERSON KOE (+628175738260)']
                ),
                'placeholder' => 'choose Fop',
                'empty_data' => '0',
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]
//
//        )->add(
//            'spv',
//            'text',
//            [
//                'constraints'=>new Assert\NotBlank(),
//                'label' => false,
//                'attr' => ['class'=>'form-control','placeholder'=>'Input spv (ex:LOMBOK 2)','required'=>'required'],
//                'label_attr'=> ['class'=>'field-label']
//            ]
        )->add(
            'longitude',
            'number',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input longitude (ex:116.497184)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'latitude',
            'number',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input latitude (ex:-8.316165)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'existing_system',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input existing system (ex:UL)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'remark',
            'text',
            [
                'constraints'=>new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Input remark (ex:Add 1 Pcs Cab.3900L (900), Add MCB 2x80A)','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'stats',
            'choice',
            [
                'constraints'=>new Assert\NotBlank(),
                'choice_list'=> new ChoiceList(
                    ['0','1','2'],['Indoor','Outdoor','Outdoor(Enclosure)']
                ),
                'placeholder' => 'Choose Status',
                'empty_data' => '0',
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]

//        )->add(
//            'subcont',
//            'text',
//            [
//                'constraints'=>new Assert\NotBlank(),
//                'label' => false,
//                'attr' => ['class'=>'form-control','placeholder'=>'Input subcont (ex:SELNET)','required'=>'required'],
//                'label_attr'=> ['class'=>'field-label']
//            ]

        )->add(
            'kirim',
            'submit',
            [
                'attr' => ['class' => 'btn btn-primary btn-block btn-flat'],
                'label' => 'submit'
            ]
        );
    }

    public function getName()
    {
        return 'site_form';
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

    public function getTowerOwner()
    {
        return $this->towerOwner;
    }

    public function setTowerOwner($towerOwner)
    {
        $this->towerOwner = $towerOwner;
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
        $this->fop =$fop;
    }

    public function getSpv()
    {
        return $this->spv;
    }

    public function setSpv($spv)
    {
        $this->spv = $spv;
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

    public function getSubcont()
    {
        return $this->subcont;
    }

    public function setSubcont($subcont)
    {
        $this->subcont = $subcont;
    }

}