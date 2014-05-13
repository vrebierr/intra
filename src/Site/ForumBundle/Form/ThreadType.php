<?php

namespace Site\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ThreadType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('title', 'text', array('label' => 'FORUM_TITLE', 'attr' => array('pattern' => '.{2,}')))
			->add('content', 'textarea', array('label' => 'FORUM_CONTENT', 'attr' => array('cols' => 70, 'rows' => 15)));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$collectionConstraint = new Collection(array(
			'title' => array(new NotBlank(array('message' => 'Subject should not be site.')),new Length(array('min' => 3))),
			'content' => array(new NotBlank(array('message' => 'Message should not be site.')),new Length(array('min' => 5)))));
		$resolver->setDefaults(array('constraints' => $collectionConstraint));
	}

	public function getName()
	{
		return ("site_forumbundle_threadtype");
	}
}
