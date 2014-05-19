<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Activity
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Activity
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
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"application/pdf"}
     * )
     * @Vich\UploadableField(mapping="subject", fileNameProperty="name")
     *
     * @var File $subject
     */
    private $subject;

    /**
     * @var integer
     *
     * @ORM\Column(name="places", type="integer")
     */
    private $places;

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
    private $startRegistration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_registration", type="datetime")
     */
    private $endRegistration;

    /**
     * @var integer
     *
     * @ORM\Column(name="size_min", type="integer")
     */
    private $sizeMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="size_max", type="integer")
     */
    private $sizeMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="peers", type="integer")
     */
    private $peers;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManytoOne(targetEntity="Module", inversedBy="activities")
     * @ORM\JoinColumn(nullable=false, name="module_id")
     */
    private $module;


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
     * @return Activity
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
     * @return Activity
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
     * Set subject
     *
     * @param File $subject
     * @return Activity
     */
    public function setSubject(File $subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return File 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set places
     *
     * @param integer $places
     * @return Activity
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

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Activity
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
     * @return Activity
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
     * Set startRegistration
     *
     * @param \DateTime $startRegistration
     * @return Activity
     */
    public function setStartRegistration($startRegistration)
    {
        $this->startRegistration = $startRegistration;

        return $this;
    }

    /**
     * Get startRegistration
     *
     * @return \DateTime 
     */
    public function getStartRegistration()
    {
        return $this->startRegistration;
    }

    /**
     * Set endRegistration
     *
     * @param \DateTime $endRegistration
     * @return Activity
     */
    public function setEndRegistration($endRegistration)
    {
        $this->endRegistration = $endRegistration;

        return $this;
    }

    /**
     * Get endRegistration
     *
     * @return \DateTime 
     */
    public function getEndRegistration()
    {
        return $this->endRegistration;
    }

    /**
     * Set sizeMin
     *
     * @param integer $sizeMin
     * @return Activity
     */
    public function setSizeMin($sizeMin)
    {
        $this->sizeMin = $sizeMin;

        return $this;
    }

    /**
     * Get sizeMin
     *
     * @return integer 
     */
    public function getSizeMin()
    {
        return $this->sizeMin;
    }

    /**
     * Set sizeMax
     *
     * @param integer $sizeMax
     * @return Activity
     */
    public function setSizeMax($sizeMax)
    {
        $this->sizeMax = $sizeMax;

        return $this;
    }

    /**
     * Get sizeMax
     *
     * @return integer 
     */
    public function getSizeMax()
    {
        return $this->sizeMax;
    }

    /**
     * Set peers
     *
     * @param integer $peers
     * @return Activity
     */
    public function setPeers($peers)
    {
        $this->peers = $peers;

        return $this;
    }

    /**
     * Get peers
     *
     * @return integer 
     */
    public function getPeers()
    {
        return $this->peers;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Activity
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set module
     *
     * @param \Site\ActivityBundle\Entity\Module $module
     * @return Activity
     */
    public function setModule(\Site\ActivityBundle\Entity\Module $module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \Site\ActivityBundle\Entity\Module 
     */
    public function getModule()
    {
        return $this->module;
    }
}
