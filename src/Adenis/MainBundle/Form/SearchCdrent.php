<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adenis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of SearchCdrent
 *
 * @author txema
 */
class SearchCdrent extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('src', 'text', array(
            'label' => 'N° Tél. (Source)',
            'required' => false,
            'mapped' => false)
        );

        $builder->add('dst', 'text', array(
            'label' => 'N° Tél. (Destination)',
            'required' => false,
            'mapped' => false)
        );

        $builder->add('dateini', 'text', array(
            'label' => 'Date de début',
            'required' => false,
            'attr' => array('class' => 'datepicker-from'),
            'mapped' => false)
        );

        $builder->add('datefin', 'text', array(
            'label' => 'Date de fin',
            'required' => false,
            'attr' => array('class' => 'datepicker-to'),
            'mapped' => false)
        );


        $builder->add('type', 'choice', array(
            'choices' => array('all' => 'Toutes', 'in' => 'Reçues', 'out' => 'Émises'),
            'required' => false,
        ));

        $builder->add('search', 'submit', array(
            'label' => 'Rechercher',
            'attr' => array('class' => 'button'))
        );
    }

    public function getName() {
        return 'search_cdrent';
    }

}
