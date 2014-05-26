<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class LessonAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('activity')
            ->add('name')
            ->add('description')
            ->add('link')
            ->add('type')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('activity')
            ->add('name')
            ->add('description')
            ->add('link')
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
            ->add('activity')
            ->add('name')
            ->add('description', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce'
                )))
            ->add('link', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.file',
                'context'  => 'default',
                'required' => false
            ))
            ->add('type', 'choice', array(
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
        ->add('activity')
        ->add('name')
        ->add('description')
        ->add('link')
        ->add('type')
        ;
    }
}
