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
            ->add('module')
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
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('module')
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
            ->add('module')
            ->add('name')
            ->add('description')
            ->add('subject', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.file',
                'context'  => 'default',
                'required' => false
            ))
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('startCorrection')
            ->add('endCorrection')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type', 'choice', array(
                'choices' => array('projet' => 'Projet', 'examen' => 'Examen', 'TD' => 'TD')
                ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('module')
            ->add('name')
            ->add('description')
            ->add('places')
            ->add('start')
            ->add('end')
            ->add('startRegistration')
            ->add('endRegistration')
            ->add('startCorrection')
            ->add('endCorrection')
            ->add('sizeMin')
            ->add('sizeMax')
            ->add('peers')
            ->add('type')
        ;
    }
}
