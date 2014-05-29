<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SubboardAdmin extends Admin
{
	protected $translationDomain = 'SiteForumBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('board', null, array('label' => 'ADMIN_SUBBOARD_BOARD'))
				->add('title', 'text', array('attr' => array('size' => 50), 'label' => 'ADMIN_SUBBOARD_TITLE'))
				->add('ghost', null, array('label' => 'ADMIN_SUBBOARD_GHOST', 'required' => false));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_SUBBOARD_ID'))
					->add('board', null, array('label' => 'ADMIN_SUBBOARD_BOARD'))
					->add('title', null, array('label' => 'ADMIN_SUBBOARD_TITLE'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_SUBBOARD_ID'))
				->addIdentifier('board', null, array('label' => 'ADMIN_SUBBOARD_BOARD'))
				->addIdentifier('title', null, array('label' => 'ADMIN_SUBBOARD_TITLE'))
				->add('threads', null, array('label' => 'ADMIN_SUBBOARD_THREADS'))
				->add('ghost', null, array('label' => 'ADMIN_SUBBOARD_GHOST', 'editable' => true))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}
}
