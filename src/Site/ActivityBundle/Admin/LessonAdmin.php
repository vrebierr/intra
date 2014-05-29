<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LessonAdmin extends Admin
{
	protected $translationDomain = 'SiteElearningBundle';

	/**
	 * @param DatagridMapper $datagridMapper
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('id', null, array('label' => 'ADMIN_ELEARNING_ID'))
			->add('activity', null, array('label' => 'ADMIN_ELEARNING_ACTIVITY'))
			->add('name', null, array('label' => 'ADMIN_ELEARNING_NAME'))
			->add('description', null, array('label' => 'ADMIN_ELEARNING_DESCRIPTION'))
			->add('link', null, array('label' => 'ADMIN_ELEARNING_LINK'))
			->add('type', null, array('label' => 'ADMIN_ELEARNING_TYPE'))
		;
	}

	/**
	 * @param ListMapper $listMapper
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->add('id', null, array('label' => 'ADMIN_ELEARNING_ID'))
			->addIdentifier('activity', null, array('label' => 'ADMIN_ELEARNING_ACTIVITY'))
			->add('name', null, array('label' => 'ADMIN_ELEARNING_NAME'))
			->add('description', null, array('label' => 'ADMIN_ELEARNING_DESCRIPTION'))
			->addIdentifier('link', null, array('label' => 'ADMIN_ELEARNING_LINK'))
			->add('type', null, array('label' => 'ADMIN_ELEARNING_TYPE'))
			->add('_action', 'actions', array(
				'actions' => array(
					'show' => array(),
					'edit' => array(),
					'delete' => array(),
				)
			))
		;
	}

	/**
	 * @param FormMapper $formMapper
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('activity', null, array('label' => 'ADMIN_ELEARNING_ACTIVITY'))
			->add('name', null, array('label' => 'ADMIN_ELEARNING_NAME'))
			->add('description', 'textarea', array(
				'label' => 'ADMIN_ELEARNING_DESCRIPTION',
				'attr' => array(
					'class' => 'tinymce'
				)))
			->add('link', 'sonata_media_type', array(
				'label' => 'ADMIN_ELEARNING_LINK',
				'provider' => 'sonata.media.provider.file',
				'context'  => 'default',
				'required' => false
			))
			->add('type', 'choice', array(
				'label' => 'ADMIN_ELEARNING_TYPE',
				'choices' => array('pdf' => 'PDF', 'video' => 'Vidéo', 'html' => 'Page HTML')
				))
		;
	}

	/**
	 * @param ShowMapper $showMapper
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
		->add('activity', null, array('label' => 'ADMIN_ELEARNING_ACTIVITY'))
		->add('name', null, array('label' => 'ADMIN_ELEARNING_NAME'))
		->add('description', null, array('label' => 'ADMIN_ELEARNING_DESCRIPTION'))
		->add('link', null, array('label' => 'ADMIN_ELEARNING_LINK'))
		->add('type', null, array('label' => 'ADMIN_ELEARNING_TYPE'))
		;
	}
}
