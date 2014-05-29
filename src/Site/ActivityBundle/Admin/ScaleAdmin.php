<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ScaleAdmin extends Admin
{

	protected $translationDomain = 'SiteActivityBundle';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('activity', null, array('label' => 'ADMIN_SCALE_ACTIVITY'))
            ->add('name', null, array('label' => 'ADMIN_SCALE_NAME'))
            ->add('description', null, array('label' => 'ADMIN_SCALE_DESCRIPTION'))
            ->add('mark', null, array('label' => 'ADMIN_SCALE_MARK'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('activity', null, array('label' => 'ADMIN_SCALE_ACTIVITY'))
            ->add('name', null, array('label' => 'ADMIN_SCALE_NAME'))
            ->add('description', null, array('label' => 'ADMIN_SCALE_DESCRIPTION'))
            ->add('mark', null, array('label' => 'ADMIN_SCALE_MARK'))
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
            ->add('activity', null, array('label' => 'ADMIN_SCALE_ACTIVITY'))
            ->add('name', null, array('label' => 'ADMIN_SCALE_NAME'))
			->add('description', 'textarea', array(
				'label' => 'ADMIN_SCALE_DESCRIPTION',
                'attr' => array(
                    'class' => 'tinymce'
                )))
            ->add('mark', null, array('label' => 'ADMIN_SCALE_MARK'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('activity', null, array('label' => 'ADMIN_SCALE_ACTIVITY'))
            ->add('name', null, array('label' => 'ADMIN_SCALE_NAME'))
            ->add('description', null, array('label' => 'ADMIN_SCALE_DESCRIPTION'))
            ->add('mark', null, array('label' => 'ADMIN_SCALE_MARK'))
        ;
    }
}
