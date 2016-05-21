<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 15/05/2016
 * Time: 1:39
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class gmapForm extends AbstractType {

    private $latitude;

    private $longitude;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'latitude',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class' => 'form-control','placeholder' => 'input latitude','required'=>'required'],
                'label_attr' => ['class'=>'field-label']
            ]
        )->add(
            'longitude',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class' => 'form-control','placeholder'=>'input longitude','required'=>'required'],
                'label_attr' => ['class'=>'field-label']
            ]
        );
    }

    public function getName()
    {
        return 'gmap_form';
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}