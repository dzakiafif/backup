<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 14:02
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;

class RemarkForm extends AbstractType {


    private $komentar;

    private $createdAt;

    private $updatedAt;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'komentar',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'input komentar','required'=>'required'],
                'label_attr' => ['class'=>'field-label']
            ]
        )->add(
            'kirim',
            'submit',
            [
                'attr' => ['class'=>'btn btn-primary btn-blok btn-flat'],
                'label' => 'submit'
            ]
        );
    }

    public function getName()
    {
        return 'remark_form';
    }

    public function getKomentar()
    {
        return $this->komentar;
    }

    public function setKomentar($komentar)
    {
        $this->komentar = $komentar;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}