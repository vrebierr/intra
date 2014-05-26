<?php

namespace Application\Sonata\UserBundle\Form;

use FOS\UserBundle\Form\Type\ChangePasswordFormType as BaseType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Validator\Constraint\UserPassword as OldUserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ChangePasswordType extends BaseType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		if (class_exists('Symfony\Component\Security\Core\Validator\Constraints\UserPassword')) {
			$constraint = new UserPassword();
		} else {
			// Symfony 2.1 support with the old constraint class
			$constraint = new OldUserPassword();
		}

		$builder->add('current_password', 'password', array(
			'label' => false,
			'translation_domain' => 'FOSUserBundle',
			'mapped' => false,
			'constraints' => $constraint,
			'attr' => array(
				'placeholder' => 'form.current_password'
		)));
		$builder->add('new', 'repeated', array(
			'type' => 'password',
			'options' => array('translation_domain' => 'FOSUserBundle'),
			'first_options' => array('label' => false, 'attr' => array('placeholder' =>  'form.new_password')),
			'second_options' => array('label' => false, 'attr' => array('placeholder' => 'form.new_password_confirmation')),
			'invalid_message' => 'fos_user.password.mismatch',
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'FOS\UserBundle\Form\Model\ChangePassword',
			'intention'  => 'change_password',
		));
	}

	public function getName()
	{
		return 'site_user_change_password';
	}
}
