<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 15/05/2016
 * Time: 9:23
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class selectSiteAfterLoginForm extends AbstractType {

    private $siteId;

    private $siteName;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
            'kirim',
            'submit',
            [
                'attr' => ['class' => 'btn btn-primary btn-block form-control btn-flat'],
                'label' => 'Validate'
            ]
        );

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'selectSite_form';
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
}