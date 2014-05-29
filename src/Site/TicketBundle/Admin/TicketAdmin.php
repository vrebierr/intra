<?php

namespace Site\TicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TicketAdmin extends Admin
{
	protected $translationDomain = 'SiteTicketBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('author', null, array('label' => 'ADMIN_TICKET_AUTHOR'))
				->add('subject', 'text', array('attr' => array('label' => 'ADMIN_TICKET_SUBJECT', 'size' => 75)))
				->add('date', 'datetime', array('label' => 'ADMIN_TICKET_DATE'))
				->add('priority', 'choice', array('choices' => array(1 => 'low', 2 => 'medium', 3 => 'high'), 'label' => 'ADMIN_TICKET_PROORITY'))
				->add('assignedTo', null, array('label' => 'ADMIN_TICKET_ASSIGNEDTO'));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_TICKET_ID'))
					->add('author', null, array('label' => 'ADMIN_TICKET_AUTHOR'))
					->add('priority', null, array('label' => 'ADMIN_TICKET_PRIORITY'))
					->add('closed', null, array('label' => 'ADMIN_TICKET_CLOSED'))
					->add('date', null, array('label' => 'ADMIN_TICKET_DATE'))
					->add('assignedTo', null, array('label' => 'ADMIN_TICKET_ASSIGNEDTO'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_TICKET_ID'))
				->addIdentifier('author', null, array('label' => 'ADMIN_TICKET_AUTHOR'))
				->addIdentifier('subject', null, array('label' => 'ADMIN_TICKET_SUBJECT'))
				->add('date', null, array('label' => 'ADMIN_TICKET_DATE'))
				->add('closed', null, array('label' => 'ADMIN_TICKET_CLOSED', 'editable' => true))
				->add('priority', null, array('label' => 'ADMIN_TICKET_PRIORITY'))
				->addIdentifier('assignedTo', null, array('label' => 'ADMIN_TICKET_ASSIGNEDTO'))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('author', null, array('label' => 'ADMIN_TICKET_AUTHOR'))
				->add('subject', 'text', array('attr' => array('label' => 'ADMIN_TICKET_SUBJECT', 'size' => 75)))
				->add('date', 'datetime', array('label' => 'ADMIN_TICKET_DATE'))
				->add('priority', 'choice', array('choices' => array(1 => 'low', 2 => 'medium', 3 => 'high'), 'label' => 'ADMIN_TICKET_PROORITY'))
				->add('assignedTo', null, array('label' => 'ADMIN_TICKET_ASSIGNEDTO'));
	}
}
