<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SubboardAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('board', null, array('label' => 'Board'))
				->add('title', 'text', array('attr' => array('size' => 50), 'label' => 'Board Title'))
				->add('subtitle', 'text', array('attr' => array('size' => 75), 'label' => 'Board Subtitle'))
				->add('ghost', null, array('label' => 'Ghost subboard', 'required' => false));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id')
					->add('board')
					->add('title');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id')
				->addIdentifier('board')
				->addIdentifier('title')
				->add('subtitle')
				->add('threads')
				->add('ghost', null, array('editable' => true))
				->add('_action', 'actions', array('actions' => array('edit' => array(), 'delete' => array())));
	}
}
