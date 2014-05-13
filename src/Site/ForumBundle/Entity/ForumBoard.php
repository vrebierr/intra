<?php

namespace Site\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumBoard
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ForumBundle\Entity\ForumBoardRepository")
 */
class ForumBoard
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
     * @ORM\OneToMany(targetEntity="ForumSubboard", mappedBy="board", cascade={"persist", "remove"})
     */
    private $subboards;

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
     * Set title
     *
     * @param string $title
     * @return Board
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

    public function __toString()
    {
        return ($this->title);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subboards = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subboards
     *
     * @param \SiteForumBundle\Entity\ForumSubboard $subboard
     * @return ForumBoard
     */
    public function addSubboard($subboard)
    {
        $this->subboards[] = $subboard;

        return $this;
    }

    /**
     * Remove subboards
     *
     * @param \SiteForumBundle\Entity\ForumSubboard $subboards
     */
    public function removeSubboard($subboard)
    {
        $this->subboards->removeElement($subboard);
    }

    /**
     * Get subboards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubboards()
    {
        return $this->subboards;
    }
}
