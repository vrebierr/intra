<?php

namespace Site\ActivityBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ActivityAdmin extends Admin
{

    protected $translationDomain = 'SiteActivityBundle';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('note', $this->getRouterIdParameter().'/note');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('module', null, array('label' => 'ADMIN_ACTIVITY_MODULE'))
            ->add('name', null, array('label' => 'ADMIN_ACTIVITY_NAME'))
            ->add('places', null, array('label' => 'ADMIN_ACTIVITY_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_ACTIVITY_START'))
            ->add('end', null, array('label' => 'ADMIN_ACTIVITY_END'))
            ->add('startRegistration', null, array('label' => 'ADMIN_ACTIVITY_STARTREGISTRATION'))
            ->add('endRegistration', null, array('label' => 'ADMIN_ACTIVITY_ENDREGISTRATION'))
            ->add('startCorrection', null, array('label' => 'ADMIN_ACTIVITY_STARTCORRECTION'))
            ->add('endCorrection', null, array('label' => 'ADMIN_ACTIVITY_ENDCORRECTION'))
            ->add('sizeMin', null, array('label' => 'ADMIN_ACTIVITY_SIZEMIN'))
            ->add('sizeMax', null, array('label' => 'ADMIN_ACTIVITY_SIZEMAX'))
            ->add('peers', null, array('label' => 'ADMIN_ACTIVITY_PEERS'))
            ->add('type', null, array('label' => 'ADMIN_ACTIVITY_TYPE'))
            ->add('randomGroups', null, array('label' => 'ADMIN_ACTIVITY_RANDOMGROUPS'))
            ->add('optionnal', null, array('label' => 'ADMIN_ACTIVITY_OPTIONNAL'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('module', null, array('label' => 'ADMIN_ACTIVITY_MODULE'))
            ->add('name', null, array('label' => 'ADMIN_ACTIVITY_NAME'))
            ->add('places', null, array('label' => 'ADMIN_ACTIVITY_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_ACTIVITY_START'))
            ->add('end', null, array('label' => 'ADMIN_ACTIVITY_END'))
            ->add('startRegistration', null, array('label' => 'ADMIN_ACTIVITY_STARTREGISTRATION'))
            ->add('endRegistration', null, array('label' => 'ADMIN_ACTIVITY_ENDREGISTRATION'))
            ->add('startCorrection', null, array('label' => 'ADMIN_ACTIVITY_STARTCORRECTION'))
            ->add('endCorrection', null, array('label' => 'ADMIN_ACTIVITY_ENDCORRECTION'))
            ->add('sizeMin', null, array('label' => 'ADMIN_ACTIVITY_SIZEMIN'))
            ->add('sizeMax', null, array('label' => 'ADMIN_ACTIVITY_SIZEMAX'))
            ->add('peers', null, array('label' => 'ADMIN_ACTIVITY_PEERS'))
            ->add('type', null, array('label' => 'ADMIN_ACTIVITY_TYPE'))
            ->add('randomGroups', null, array('label' => 'ADMIN_ACTIVITY_RANDOMGROUPS'))
            ->add('optionnal', null, array('label' => 'ADMIN_ACTIVITY_OPTIONNAL', 'editable' => true))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'note' => array(
                        'template' => 'SiteActivityBundle:CRUD:list__action_note.html.twig'
                    )
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
            ->add('module', null, array('label' => 'ADMIN_ACTIVITY_MODULE'))
            ->add('name', null, array('label' => 'ADMIN_ACTIVITY_NAME'))
            ->add('description', 'textarea', array(
                'label' => 'ADMIN_ACTIVITY_DESCRIPTION',
                'attr' => array(
                    'class' => 'tinymce'
                )))
            ->add('subject', 'sonata_media_type', array(
                'label' => 'ADMIN_ACTIVITY_SUBJECT',
                'provider' => 'sonata.media.provider.file',
                'context'  => 'default',
                'required' => false
            ))
            ->add('places', null, array('label' => 'ADMIN_ACTIVITY_PLACES'))
            ->add('start', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_START'))
            ->add('end', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_END'))
            ->add('startRegistration', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_STARTREGISTRATION'))
            ->add('endRegistration', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_ENDREGISTRATION'))
            ->add('startCorrection', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_STARTCORRECTION'))
            ->add('endCorrection', 'dateTimePicker', array('label' => 'ADMIN_ACTIVITY_ENDCORRECTION'))
            ->add('sizeMin', null, array('label' => 'ADMIN_ACTIVITY_SIZEMIN'))
            ->add('sizeMax', null, array('label' => 'ADMIN_ACTIVITY_SIZEMAX'))
            ->add('peers', null, array('label' => 'ADMIN_ACTIVITY_PEERS'))
            ->add('type', 'choice', array(
                'label' => 'ADMIN_ACTIVITY_TYPE',
                'choices' => array('projet' => 'Projet', 'examen' => 'Examen', 'TD' => 'TD', 'rush' => 'Rush')
                ))
            ->add('randomGroups', null, array('label' => 'ADMIN_ACTIVITY_RANDOMGROUPS', 'required' => false))
            ->add('optionnal', null, array('label' => 'ADMIN_ACTIVITY_OPTIONNAL', 'required' => false))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('module', null, array('label' => 'ADMIN_ACTIVITY_MODULE'))
            ->add('name', null, array('label' => 'ADMIN_ACTIVITY_NAME'))
            ->add('description', null, array('label' => 'ADMIN_ACTIVITY_DESCRIPTION'))
            ->add('places', null, array('label' => 'ADMIN_ACTIVITY_PLACES'))
            ->add('start', null, array('label' => 'ADMIN_ACTIVITY_START'))
            ->add('end', null, array('label' => 'ADMIN_ACTIVITY_END'))
            ->add('startRegistration', null, array('label' => 'ADMIN_ACTIVITY_STARTREGISTRATION'))
            ->add('endRegistration', null, array('label' => 'ADMIN_ACTIVITY_ENDREGISTRATION'))
            ->add('startCorrection', null, array('label' => 'ADMIN_ACTIVITY_STARTCORRECTION'))
            ->add('endCorrection', null, array('label' => 'ADMIN_ACTIVITY_ENDCORRECTION'))
            ->add('sizeMin', null, array('label' => 'ADMIN_ACTIVITY_SIZEMIN'))
            ->add('sizeMax', null, array('label' => 'ADMIN_ACTIVITY_SIZEMAX'))
            ->add('peers', null, array('label' => 'ADMIN_ACTIVITY_PEERS'))
            ->add('type', null, array('label' => 'ADMIN_ACTIVITY_TYPE'))
            ->add('randomGroups', null, array('label' => 'ADMIN_ACTIVITY_RANDOMGROUPS'))
            ->add('optionnal', null, array('label' => 'ADMIN_ACTIVITY_OPTIONNAL'))
        ;
    }
}
