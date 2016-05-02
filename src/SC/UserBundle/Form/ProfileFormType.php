<?php
/**
 * Created by PhpStorm.
 * User: Qualshore
 * Date: 24/04/2016
 * Time: 03:41
 */

namespace SC\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname');
        $builder->add('lasttname');
        $builder->add('address');
        $builder->add('telephone');
        $builder->add('structure');
        $builder->add('function');
        $builder->add('website');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}