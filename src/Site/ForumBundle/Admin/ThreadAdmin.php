<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ThreadAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('subboard', null, array('label' => 'Subboard'))
				->add('title', 'text', array('attr' => array('label' => 'Thread Title', 'size' => 75)))
				->add('author', null, array('label' => 'Author'))
				->add('date', 'datetime', array('label' => 'Created at'))
				->add('content', 'textarea', array('attr' => array('label' => 'Content', 'cols' => 100, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id')
					->add('title')
					->add('author')
					->add('date')
					->add('pinned')
					->add('locked');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id')
				->addIdentifier('subboard')
				->addIdentifier('title')
				->add('author')
				->add('date')
				->add('pinned', null, array('editable' => true))
				->add('locked', null, array('editable' => true))
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}
}
