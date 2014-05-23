<?php

namespace Site\ActivityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Application\Sonata\userBundle\Entity\User;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ActivityGroupType extends AbstractType
{
    protected $students;
    protected $activity;

    public function __construct(Array $students, $activity)
    {
        $this->students = $students;
        $this->activity = $activity;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('students', 'choice', array(
                'choices' => $this->students,
                'expanded' => false,
                'multiple' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'students' => array(new NotBlank(),new Length(array('min' => $this->activity->getSizeMin(), 'max' => $this->activity->getSizeMax())))));
        $resolver->setDefaults(array(
            'data_class' => 'Site\ActivityBundle\Entity\ActivityGroup'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_activitybundle_activitygroup';
    }
}
