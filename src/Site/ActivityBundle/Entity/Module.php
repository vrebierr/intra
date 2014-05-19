<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Module
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="credits", type="integer")
     */
    private $credits;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_registration", type="datetime")
     */
    private $start_registration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_registration", type="datetime")
     */
    private $end_registration;

    /**
     * @var integer
     *
     * @ORM\Column(name="places", type="integer")
     */
    private $places;


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
     * @return Module
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
     * @return Module
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
     * Set credits
     *
     * @param integer $credits
     * @return Module
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Get credits
     *
     * @return integer 
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Module
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Module
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set start_registration
     *
     * @param \DateTime $startRegistration
     * @return Module
     */
    public function setStartRegistration($startRegistration)
    {
        $this->start_registration = $startRegistration;

        return $this;
    }

    /**
     * Get start_registration
     *
     * @return \DateTime 
     */
    public function getStartRegistration()
    {
        return $this->start_registration;
    }

    /**
     * Set end_registration
     *
     * @param \DateTime $endRegistration
     * @return Module
     */
    public function setEndRegistration($endRegistration)
    {
        $this->end_registration = $endRegistration;

        return $this;
    }

    /**
     * Get end_registration
     *
     * @return \DateTime 
     */
    public function getEndRegistration()
    {
        return $this->end_registration;
    }

    /**
     * Set places
     *
     * @param integer $places
     * @return Module
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return integer 
     */
    public function getPlaces()
    {
        return $this->places;
    }
}
