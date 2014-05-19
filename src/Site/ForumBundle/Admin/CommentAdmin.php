<?php

namespace Site\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper->add('post', null, array('label' => 'Post'))
				->add('author', null, array('label' => 'Author'))
				->add('date', 'datetime', array('label' => 'Created at'))
				->add('content', 'textarea', array('attr' => array('label' => 'Content', 'cols' => 100, 'rows' => 15)));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('id')
					->add('post')
					->add('author')
					->add('date');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper->addIdentifier('id')
				->addIdentifier('post')
				->add('author')
				->add('date')
				->add('_action', 'actions', array('actions' => array('show' => array(), 'edit' => array(), 'delete' => array())));
	}
}
