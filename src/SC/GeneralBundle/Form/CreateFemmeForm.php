<?php

namespace SC\GeneralBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class CreateFemmeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        switch ($options['flow_step']) {
            case 1:
                $validValues = array(2, 4);
                $builder->add('numberOfWheels', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices' => array_combine($validValues, $validValues),
                    'placeholder' => '',
                ));
                break;
            case 2:
                // This form type is not defined in the example.
                $builder->add('engine', 'sc_generalbundle_femme', array(
                    'placeholder' => '',
                ));
                break;
        }
    }

    public function getBlockPrefix() {
        return 'createFemme';
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sc_generalbundle_CreateFemmeForm';
    }
}