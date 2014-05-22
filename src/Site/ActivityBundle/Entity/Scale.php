<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scale
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Scale
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
     * @var integer
     *
     * @ORM\Column(name="mark", type="integer")
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OnetoOne(targetEntity="Activity")
     * @ORM\JoinColumn(nullable=false, name="activity_id")
     */
    private $activity;


    public function getMarks()
    {
        $tab = array();
        for ($i = 0; $i <= $this->getMark(); $i++)
            $tab[] = $i;
        return ($tab);
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
     * Set mark
     *
     * @param integer $mark
     * @return Scale
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return integer 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Scale
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
     * Set description
     *
     * @param string $description
     * @return Scale
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set activity
     *
     * @param \Site\ActivityBundle\Entity\Activity $activity
     * @return Scale
     */
    public function setActivity(\Site\ActivityBundle\Entity\Activity $activity)
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
}
