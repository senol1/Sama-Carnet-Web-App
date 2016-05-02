<?php
/**
 * Created by PhpStorm.
 * User: Qualshore
 * Date: 17/04/2016
 * Time: 23:52
 */

namespace SC\GeneralBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class CreateFemmeFlow extends FormFlow
{
    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'wheels',
                'form_type' => 'SC\GeneralBundle\Form\CreateFemmeForm',
            ),
            array(
                'label' => 'engine',
                'form_type' => 'SC\GeneralBundle\Form\CreateFemmeForm',
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    return $estimatedCurrentStepNumber > 1 && !$flow->getFormData()->canHaveEngine();
                },
            ),
            array(
                'label' => 'confirmation',
            ),
        );
    }
}