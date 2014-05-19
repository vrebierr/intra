<?php

namespace Site\TicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TicketAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('author', null, array('label' => 'Author'))
				->add('subject', 'text', array('attr' => array('label' => 'Subject', 'size' => 75)))
				->add('date', 'datetime', array('label' => 'Created at'))
				->add('priority', 'choice', array('choices' => array(1 => 'low', 2 => 'medium', 3 => 'high'), 'label' => 'Priority'))
				->add('assignedTo', null, array('label' => 'Assigned to'));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id')
					->add('author')
					->add('closed')
					->add('date')
					->add('assignedTo');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id')
				->addIdentifier('author')
				->addIdentifier('subject')
				->add('date')
				->add('closed', null, array('editable' => true))
				->addIdentifier('assignedTo')
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}
}
