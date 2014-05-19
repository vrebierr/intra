<?php

namespace Site\TicketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class MessageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('content', 'textarea', array('label' => false, 'attr' => array('cols' => 70, 'rows' => 15, 'placeholder' => 'TICKET_LABEL_CONTENT')));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$collectionConstraint = new Collection(array(
			'content' => array(new NotBlank(array('message' => 'Message should not be blank.')),new Length(array('min' => 5)))));
		$resolver->setDefaults(array('constraints' => $collectionConstraint));
	}

	public function getName()
	{
		return ("site_ticketbundle_messagetype");
	}
}
