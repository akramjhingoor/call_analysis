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
class SearchPlace extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('dst', 'text', array(
            'label' => 'N° Tél. (Source)',
            'required' => false,
            'mapped' => false)
        );

        $builder->add('search', 'submit', array(
            'label' => 'Rechercher',
            'attr' => array('class' => 'button')));
    }

    public function getName() {
        return 'search_place';
    }

}
