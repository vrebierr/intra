<?php

namespace Site\MessageBundle\Form;

use FOS\MessageBundle\FormType\ReplyMessageFormType as BaseType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReplyMessageType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body', 'textarea', array('label' => false, 'attr' => array('placeholder' => 'FORM_BODY')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'reply',
        ));
    }

    public function getName()
    {
        return 'site_message_reply_message';
    }
}
