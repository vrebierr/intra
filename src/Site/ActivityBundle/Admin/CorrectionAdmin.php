<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CorrectionAdmin extends Admin
{

	protected $translationDomain = 'SiteActivityBundle';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('activity', null, array('label' => 'ADMIN_CORRECTION_ACTIVITY'))
            ->add('rater', null, array('label' => 'ADMIN_CORRECTION_RATER'))
            ->add('note', null, array('label' => 'ADMIN_CORRECTION_NOTE'))
            ->add('done', null, array('label' => 'ADMIN_CORRECTION_DONE'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('activity', null, array('label' => 'ADMIN_CORRECTION_ACTIVITY'))
            ->add('scale', null, array('label' => 'ADMIN_CORRECTION_SCALE'))
            ->add('group', null, array('label' => 'ADMIN_CORRECTION_GROUP'))
            ->add('rater', null, array('label' => 'ADMIN_CORRECTION_RATER'))
            ->add('note', null, array('label' => 'ADMIN_CORRECTION_NOTE'))
            ->add('comment', null, array('label' => 'ADMIN_CORRECTION_COMMENT'))
            ->add('done', null, array('label' => 'ADMIN_CORRECTION_DONE'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array()
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
            ->add('activity', null, array('label' => 'ADMIN_CORRECTION_ACTIVITY'))
            ->add('scale', null, array('label' => 'ADMIN_CORRECTION_SCALE'))
            ->add('group', null, array('label' => 'ADMIN_CORRECTION_GROUP'))
            ->add('rater', 'dateTimePicker', array('label' => 'ADMIN_CORRECTION_RATER'))
            ->add('note', 'dateTimePicker', array('label' => 'ADMIN_CORRECTION_NOTE'))
            ->add('comment', 'dateTimePicker', array('label' => 'ADMIN_CORRECTION_COMMENT'))
            ->add('done', 'dateTimePicker', array('label' => 'ADMIN_CORRECTION_DONE'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('activity', null, array('label' => 'ADMIN_CORRECTION_ACTIVITY'))
            ->add('scale', null, array('label' => 'ADMIN_CORRECTION_SCALE'))
            ->add('group', null, array('label' => 'ADMIN_CORRECTION_GROUP'))
            ->add('rater', null, array('label' => 'ADMIN_CORRECTION_RATER'))
            ->add('note', null, array('label' => 'ADMIN_CORRECTION_NOTE'))
            ->add('comment', null, array('label' => 'ADMIN_CORRECTION_COMMENT'))
            ->add('done', null, array('label' => 'ADMIN_CORRECTION_DONE'))
        ;
    }

}
