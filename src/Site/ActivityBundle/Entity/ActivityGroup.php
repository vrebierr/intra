<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityGroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ActivityGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManytoOne(targetEntity="\Site\ActivityBundle\Entity\Activity", inversedBy="groups")
     * @ORM\JoinColumn(name="activity")
     */
    private $activity;

    /**
     * @ORM\ManyToMany(targetEntity="\Application\Sonata\UserBundle\Entity\User", inversedBy="activity_groups")
     * @ORM\JoinTable(name="activity_groups_users")
     */
    private $students;

    public $peers;


    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ActivityGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set createdAt
     *
     * @param string $date
     * @return ActivityGroup
     */
    public function setCreatedAt($date)
    {
        $this->createdAt = $date;
    }

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set activity
     *
     * @param \Site\ActivityBundle\Entity\Activity $activity
     * @return ActivityGroup
     */
    public function setActivity(\Site\ActivityBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \Site\ActivityBundle\Entity\Activity 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Add students
     *
     * @param \Application\Sonata\UserBundle\Entity\User $students
     * @return ActivityGroup
     */
    public function addStudent(\Application\Sonata\UserBundle\Entity\User $students)
    {
        $this->students[] = $students;

        return $this;
    }

    /**
     * Remove students
     *
     * @param \Application\Sonata\UserBundle\Entity\User $students
     */
    public function removeStudent(\Application\Sonata\UserBundle\Entity\User $students)
    {
        $this->students->removeElement($students);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }
}
