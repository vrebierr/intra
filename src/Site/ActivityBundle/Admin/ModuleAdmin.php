<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ModuleAdmin extends Admin
{

    protected $translationDomain = 'SiteActivityBundle';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'ADMIN_MODULE_NAME'))
            ->add('credits', null, array('label' => 'ADMIN_MODULE_CREDITS'))
            ->add('places', null, array('label' => 'ADMIN_MODULE_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_MODULE_START'))
            ->add('end', null, array('label' => 'ADMIN_MODULE_END'))
            ->add('optionnal', null, array('label' => 'ADMIN_MODULE_OPTIONNAL'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'ADMIN_MODULE_NAME'))
            ->add('credits', null, array('label' => 'ADMIN_MODULE_CREDITS'))
            ->add('places', null, array('label' => 'ADMIN_MODULE_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_MODULE_START'))
            ->add('end', null, array('label' => 'ADMIN_MODULE_END'))
            ->add('startRegistration', null, array('label' => 'ADMIN_MODULE_STARTREGISTRATION'))
            ->add('endRegistration', null, array('label' => 'ADMIN_MODULE_ENDREGISTRATION'))
            ->add('optionnal', null, array('label' => 'ADMIN_MODULE_OPTIONNAL', 'editable' => true))
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
            ->add('name', null, array('label' => 'ADMIN_MODULE_NAME'))
            ->add('description', 'textarea', array(
                'label' => 'ADMIN_MODULE_DESCRIPTION',
                'attr' => array(
                    'class' => 'tinymce'
                )))
            ->add('credits', null, array('label' => 'ADMIN_MODULE_CREDITS'))
            ->add('places', null, array('label' => 'ADMIN_MODULE_PLACES'))
            ->add('start', 'dateTimePicker', array('label' => 'ADMIN_MODULE_START'))
            ->add('end', 'dateTimePicker', array('label' => 'ADMIN_MODULE_END'))
            ->add('startRegistration', 'dateTimePicker', array('label' => 'ADMIN_MODULE_STARTREGISTRATION'))
            ->add('endRegistration', 'dateTimePicker', array('label' => 'ADMIN_MODULE_ENDREGISTRATION'))
            ->add('optionnal', null, array('label' => 'ADMIN_MODULE_OPTIONNAL', 'required' => false))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array('label' => 'ADMIN_MODULE_NAME'))
            ->add('description', null, array('label' => 'ADMIN_MODULE_DESCRIPTION'))
            ->add('credits', null, array('label' => 'ADMIN_MODULE_CREDITS'))
            ->add('places', null, array('label' => 'ADMIN_MODULE_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_MODULE_START'))
            ->add('end', null, array('label' => 'ADMIN_MODULE_END'))
            ->add('startRegistration', null, array('label' => 'ADMIN_MODULE_STARTREGISTRATION'))
            ->add('endRegistration', null, array('label' => 'ADMIN_MODULE_ENDREGISTRATION'))
            ->add('optionnal', null, array('label' => 'ADMIN_MODULE_OPTIONNAL'))
        ;
    }
}
