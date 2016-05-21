<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/04/16
 * Time: 22:30
 */

namespace Yanna\bts\Http\Form;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;

class userForm extends AbstractType
{
    private $name;

    private $username;

    private $password;

    private $role;

    private $createdAt;

    private $updatedAt;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'name',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' => ['class'=>'form-control','placeholder'=>'Full Name','required'=>'required'],
                'label_attr' => ['class'=>'field-label']
            ]
        )->add(
            'username',
            'text',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' =>['class'=>'form-control','placeholder'=>'Input Username','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]
        )->add(
            'password',
            'password',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false,
                'attr' =>['class'=>'form-control','placeholder'=>'Input Password','required'=>'required'],
                'label_attr'=> ['class'=>'field-label']
            ]

        )->add(
            'role',
            'choice',
            [
                'constraints' => new Assert\NotBlank(),
                'choice_list' => new ChoiceList(
                    ['0','1','2','3'],['0 - Owner','1 - Vendor','2 - Documentation','3 - Engineer']
                ),
                'placeholder' => 'Choose Role',
                'empty_data' => '0',
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'kirim',
            'submit',
            [
                'attr' => ['class' => 'btn btn-primary btn-block btn-flat'],
                'label' => 'Eksekusi'
            ]
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
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