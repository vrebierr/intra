<?php

namespace Site\TicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MessageAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('ticket', null, array('label' => 'Ticket'))
				->add('author', null, array('label' => 'Author'))
				->add('content', 'textarea', array('attr' => array('label' => 'Content', 'cols' => 70, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id')
					->add('ticket')
					->add('author')
					->add('date');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id')
				->addIdentifier('ticket')
				->addIdentifier('author')
				->addIdentifier('content')
				->add('date')
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}
}
