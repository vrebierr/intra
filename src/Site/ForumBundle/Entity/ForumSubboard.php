<?php

namespace Site\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subboard
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ForumBundle\Entity\ForumSubboardRepository")
 */
class ForumSubboard
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
     * @var boolean
     *
     * @ORM\Column(name="ghost", type="boolean")
     */
	private $ghost = false;

    /**
     * @ORM\ManytoOne(targetEntity="ForumBoard", inversedBy="subboards")
     * @ORM\JoinColumn(nullable=false, name="board_id")
     */
    private $board;

    /**
     * @ORM\OneToMany(targetEntity="ForumThread", mappedBy="subboard", cascade={"persist", "remove"})
     */
    private $threads;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

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
     * Set ghost
     *
     * @param boolean $ghost
     * @return ForumSubboard
     */
    public function setGhost($ghost)
    {
        $this->ghost = $ghost;

        return $this;
	}

    /**
     * Get ghost
     *
     * @return string
     */
    public function getGhost()
    {
        return $this->ghost;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Subboard
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set board
     *
     * @param \Site\ForumBundle\Entity\ForumBoard $board
     * @return Subboard
     */
    public function setBoard(\Site\ForumBundle\Entity\ForumBoard $board)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return \Site\ForumBundle\Entity\Board 
     */
    public function getBoard()
    {
        return $this->board;
    }

    public function __toString()
    {
        return ($this->title);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->threads = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add threads
     *
     * @param \Site\ForumBundle\Entity\ForumThread $threads
     * @return ForumSubboard
     */
    public function addThread(\Site\ForumBundle\Entity\ForumThread $threads)
    {
        $this->threads[] = $threads;

        return $this;
    }

    /**
     * Remove threads
     *
     * @param \Site\ForumBundle\Entity\ForumThread $threads
     */
    public function removeThread(\Site\ForumBundle\Entity\ForumThread $threads)
    {
        $this->threads->removeElement($threads);
    }

    /**
     * Get threads
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getThreads()
    {
        return $this->threads;
    }
}
