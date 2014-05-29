<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CommentAdmin extends Admin
{
	protected $translationDomain = 'SiteForumBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('post', null, array('label' => 'ADMIN_COMMENT_POST'))
				->add('author', null, array('label' => 'ADMIN_COMMENT_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_COMMENT_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'ADMIN_COMMENT_CONTENT', 'cols' => 100, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_COMMENT_ID'))
					->add('post', null, array('label' => 'ADMIN_COMMENT_POST'))
					->add('author', null, array('label' => 'ADMIN_COMMENT_AUTHOR'))
					->add('date', null, array('label' => 'ADMIN_COMMENT_DATE'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_COMMENT_ID'))
				->addIdentifier('post', null, array('label' => 'ADMIN_COMMENT_POST'))
				->add('author', null, array('label' => 'ADMIN_COMMENT_AUTHOR'))
				->add('date', null, array('label' => 'ADMIN_COMMENT_DATE'))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('post', null, array('label' => 'ADMIN_COMMENT_POST'))
				->add('author', null, array('label' => 'ADMIN_COMMENT_AUTHOR'))
				->add('date', 'datetime', array('label' => 'ADMIN_COMMENT_DATE'))
				->add('content', 'textarea', array('attr' => array('label' => 'ADMIN_COMMENT_CONTENT', 'cols' => 100, 'rows' => 15)));
	}
}
