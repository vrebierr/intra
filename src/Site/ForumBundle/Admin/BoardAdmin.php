<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BoardAdmin extends Admin
{
	protected $translationDomain = 'SiteForumBundle';

	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('title', 'text', array('label' => 'ADMIN_BOARD_TITLE'));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id', null, array('label' => 'ADMIN_BOARD_ID'))
					->add('title', null, array('label' => 'ADMIN_BOARD_TITLE'));
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id', null, array('label' => 'ADMIN_BOARD_ID'))
				->addIdentifier('title', null, array('label' => 'ADMIN_BOARD_TITLE'))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}

    protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper->add('title', 'text', array('label' => 'ADMIN_BOARD_TITLE'));
	}
}
