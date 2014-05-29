<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PostAdmin extends Admin
{
	protected $translationDomain = 'SiteForumBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('thread', null, array('label' => 'ADMIN_POST_THREAD'))
				->add('author', null, array('label' => 'ADMIN_POST_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_POST_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'Content', 'cols' => 100, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_POST_ID'))
					->add('thread', null, array('label' => 'ADMIN_POST_THREAD'))
					->add('author', null, array('label' => 'ADMIN_POST_AUTHOR'))
					->add('date', null, array('label' => 'ADMIN_POST_DATE'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_POST_ID'))
				->addIdentifier('thread', null, array('label' => 'ADMIN_POST_THREAD'))
				->add('author', null, array('label' => 'ADMIN_POST_AUTHOR'))
				->add('date', null, array('label' => 'ADMIN_POST_DATE'))
				->add('locked', null, array('label' => 'ADMIN_POST_LOCKED', 'editable' => true))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

    protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('thread', null, array('label' => 'ADMIN_POST_THREAD'))
				->add('author', null, array('label' => 'ADMIN_POST_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_POST_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'Content', 'cols' => 100, 'rows' => 15)));
	}
}
