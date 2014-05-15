<?php

namespace Site\TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketTicket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\TicketBundle\Entity\TicketTicketRepository")
 */
class TicketTicket
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
     * @ORM\OneToMany(targetEntity="Site\TicketBundle\Entity\TicketMessage", mappedBy="ticket", cascade={"persist", "remove"})
     */
    private $messages;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, name = "author")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var boolean
     *
     * @ORM\Column(name="closed", type="boolean")
     */
    private $closed = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, name="assigned_to")
     */
    private $assignedTo;

    public function __construct()
    {
        $this->setDate(new \Datetime());
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
     * Set subject
     *
     * @param string $subject
     * @return TicketTicket
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     * @return TicketTicket
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return TicketTicket
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return TicketTicket
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add message
     *
     * @param \Site\TicketBundle\Entity\TicketMessage $message
     * @return TicketTicket
     */
    public function addMessages(\Site\TicketBundle\Entity\TicketMessage $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Site\TicketBundle\Entity\TicketMessage $message
     */
    public function removeMessages(\Site\TicketBundle\Entity\TicketMessage $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get message
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set author
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     * @return TicketTicket
     */
    public function setAuthor(\Application\Sonata\UserBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set assignedTo
     *
     * @param \Application\Sonata\UserBundle\Entity\User $assignedTo
     * @return TicketTicket
     */
    public function setAssignedTo(\Application\Sonata\UserBundle\Entity\User $assignedTo = null)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * Get assignedTo
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    public function __toString()
    {
        return $this->subject;
    }
}
