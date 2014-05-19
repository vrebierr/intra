<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ActivityAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type')
            ->add('module')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('description')
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type')
            ->add('module')
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
            ->add('name')
            ->add('description')
            ->add('subject', 'file')
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type')
            ->add('module')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('description')
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type')
            ->add('module')
        ;
    }
}
