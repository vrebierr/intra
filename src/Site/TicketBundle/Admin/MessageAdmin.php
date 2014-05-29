<?php

namespace Site\TicketBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MessageAdmin extends Admin
{
	protected $translationDomain = 'SiteTicketBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('ticket', null, array('label' => 'ADMIN_MESSAGE_TICKET'))
				->add('author', null, array('label' => 'ADMIN_MESSAGE_AUTHOR'))
				->add('content', 'textarea', array('label' => 'ADMIN_MESSAGE_CONTENT', 'attr' => array('class' => 'tinymce')));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_MESSAGE_ID'))
					->add('ticket', null, array('label' => 'ADMIN_MESSAGE_TICKET'))
					->add('author', null, array('label' => 'ADMIN_MESSAGE_AUTHOR'))
					->add('date', null, array('label' => 'ADMIN_MESSAGE_DATE'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_MESSAGE_ID'))
				->addIdentifier('ticket', null, array('label' => 'ADMIN_MESSAGE_TICKET'))
				->addIdentifier('author', null, array('label' => 'ADMIN_MESSAGE_AUTHOR'))
				->addIdentifier('content', null, array('label' => 'ADMIN_MESSAGE_CONTENT'))
				->add('date', null, array('label' => 'ADMIN_MESSAGE_DATE'))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('ticket', null, array('label' => 'ADMIN_MESSAGE_TICKET'))
				->add('author', null, array('label' => 'ADMIN_MESSAGE_AUTHOR'))
				->add('content', 'textarea', array('label' => 'ADMIN_MESSAGE_CONTENT', 'attr' => array('class' => 'tinymce')));
	}

}
