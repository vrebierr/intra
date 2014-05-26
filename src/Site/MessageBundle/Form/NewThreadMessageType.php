<?php

namespace Site\MessageBundle\Form;

use FOS\MessageBundle\FormType\NewThreadMessageFormType as BaseType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewThreadMessageType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('recipient', 'fos_user_username', array('label' => false, 'attr' => array('placeholder' => 'FORM_RECIPIENT')))
			->add('subject', 'text', array('label' => false, 'attr' => array('placeholder' => 'FORM_SUBJECT')))
			->add('body', 'textarea', array('label' => false, 'attr' => array('placeholder' => 'FORM_BODY')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'message',
        ));
    }

    public function getName()
    {
        return 'site_message_new_thread';
    }
}
