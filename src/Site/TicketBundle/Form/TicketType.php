<?php

namespace Site\TicketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class TicketType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('subject', 'text', array('label' => false, 'attr' => array('placeholder' => 'TICKET_LABEL_SUBJECT')))
			->add('content', 'textarea', array('label' => false, 'attr' => array('cols' => 70, 'rows' => 15, 'placeholder' => 'TICKET_LABEL_CONTENT')))
			->add('priority', 'choice', array('choices' => array(1 => 'TICKET_PRIORITY_LOW', 2 => 'TICKET_PRIORITY_MEDIUM', 3 => 'TICKET_PRIORITY_HIGH'), 'label' => 'TICKET_LABEL_PRIORITY'));
	}

	public function getName()
	{
		return ("site_ticketbundle_tickettype");
	}
}
