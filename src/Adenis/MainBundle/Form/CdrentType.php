<?php

namespace Adenis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CdrentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('calldate')
                ->add('clid')
                ->add('src')
                ->add('dst')
                ->add('dcontext')
                ->add('channel')
                ->add('dstchannel')
                ->add('lastapp')
                ->add('lastdata')
                ->add('duration')
                ->add('billsec')
                ->add('disposition')
                ->add('amaflags')
                ->add('accountcode')
                ->add('uniqueid')
                ->add('userfield')
                ->add('sequence')
                ->add('linkedid')
                ->add('astcause')
                ->add('techcause')
                ->add('trunkname')
                ->add('prefix')
                ->add('lineType')
                ->add('region')
                ->add('destination')
                ->add('sellingRate')
                ->add('connectionCharge')
                ->add('buyingRate')
                ->add('cost')
                ->add('authorization')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Adenis\MainBundle\Entity\Cdrent'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'adenis_mainbundle_cdrent';
    }

}
