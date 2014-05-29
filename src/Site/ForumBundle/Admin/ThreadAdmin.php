<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ThreadAdmin extends Admin
{
	protected $translationDomain = 'SiteForumBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('subboard', null, array('label' => 'ADMIN_THREAD_SUBBOARD'))
				->add('title', 'text', array('attr' => array('label' => 'ADMIN_THREAD_TITLE', 'size' => 75)))
				->add('author', null, array('label' => 'ADMIN_THREAD_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_THREAD_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'ADMIN_THREAD_CONTENT', 'cols' => 100, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_THREAD_ID'))
					->add('subboard', null, array('label' => 'ADMIN_THREAD_SUBBOARD'))
					->add('title', null, array('label' => 'ADMIN_THREAD_TITLE'))
					->add('author', null, array('label' => 'ADMIN_THREAD_AUTHOR'))
					->add('date', null, array('label' => 'ADMIN_THREAD_DATE'))
					->add('pinned', null, array('label' => 'ADMIN_THREAD_PINNED'))
					->add('locked', null, array('label' => 'ADMIN_THREAD_LOCKED'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_THREAD_ID'))
				->addIdentifier('subboard', null, array('label' => 'ADMIN_THREAD_SUBBOARD'))
				->addIdentifier('title', null, array('label' => 'ADMIN_THREAD_TITLE'))
				->add('author', null, array('label' => 'ADMIN_THREAD_AUTHOR'))
				->add('date', null, array('label' => 'ADMIN_THREAD_CONTENT'))
				->add('pinned', null, array('label' => 'ADMIN_THREAD_PINNED', 'editable' => true))
				->add('locked', null, array('label' => 'ADMIN_THREAD_LOCKED', 'editable' => true))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('subboard', null, array('label' => 'ADMIN_THREAD_SUBBOARD'))
				->add('title', 'text', array('attr' => array('label' => 'ADMIN_THREAD_TITLE', 'size' => 75)))
				->add('author', null, array('label' => 'ADMIN_THREAD_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_THREAD_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'ADMIN_THREAD_CONTENT', 'cols' => 100, 'rows' => 15)));
	}
}
