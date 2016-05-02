<?php

namespace SC\GeneralBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class FemmeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('adresse')
            ->add('ville')
            ->add('pays')
            ->add('telephone')
            ->add('telephonemari')
            ->add('age')
            ->add('nombreenfants')
            ->add('etatgrossesse')
            ->add('status')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SC\GeneralBundle\Entity\Femme'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sc_generalbundle_femme';
    }
}
