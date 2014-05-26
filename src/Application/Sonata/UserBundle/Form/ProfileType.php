<?php

namespace Application\Sonata\UserBundle\Form;

use Sonata\UserBundle\Form\Type\ProfileType as BaseType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\UserBundle\Model\UserInterface;

class ProfileType extends BaseType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('firstname', null, array(
				'label'	=> false,
				'required' => false,
				'attr' => array(
					'placeholder' => 'form.label_firstname'
			)))
			->add('lastname', null, array(
				'label'	=> false,
				'required' => false,
				'attr' => array(
					'placeholder' => 'form.label_lastname'
			)))
			->add('gender', 'sonata_user_gender', array(
				'label'	=> false,
				'required' => true,
				'expanded' => true,
				'translation_domain' => 'SonataUserBundle',
				'choices' => array(
					UserInterface::GENDER_FEMALE => 'gender_female',
					UserInterface::GENDER_MALE   => 'gender_male',
				),
			))
			->add('phone', null, array(
				'label'	=> false,
				'required' => false,
				'attr' => array(
					'placeholder' => 'form.label_phone'
			)))
			->add('dateOfBirth', 'birthday', array(
				'label'	=> false,
				'required' => false,
				'widget'   => 'single_text'
			))
			->add('website', 'url', array(
				'label'	=> false,
				'required' => false,
				'attr' => array(
					'placeholder' => 'form.label_website'
			)))
			->add('biography', 'textarea', array(
				'label'	=> false,
				'required' => false,
				'attr' => array(
					'placeholder' => 'form.label_biography'
			)))
			->add('locale', 'choice', array(
				'label'	=> false,
				'required' => false,
				'choices' => array(
					'fr_FR' => 'French',
					'en' => 'English'
				),
				'attr' => array(
					'class' => 'ui selection dropdown'
			)))
		;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return 'application_sonata_user_profile';
	}
}
