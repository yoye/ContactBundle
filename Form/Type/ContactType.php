<?php

namespace Yoye\Bundle\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('message', 'textarea')
        ;
    }

    public function getName()
    {
        return 'contact';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Yoye\Bundle\ContactBundle\Entity\Message',
        );
    }

}