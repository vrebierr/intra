<?php

namespace Site\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thread
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ForumBundle\Entity\ForumThreadRepository")
 */
class ForumThread
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
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pinned", type="boolean")
     */
     private $pinned = false;

    /**
     * @ORM\ManyToOne(targetEntity="ForumSubboard", inversedBy="threads")
     * @ORM\JoinColumn(nullable=false, name="subboard_id")
     */
    private $subboard;

    /**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="thread", cascade={"persist", "remove"})
     */
    private $posts;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="threads")
     * @ORM\JoinColumn(nullable=false, name="author")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set locked
     *
     * @param boolean $locked
     * @return ForumThread
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return string
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set pinned
     *
     * @param boolean $pinned
     * @return ForumThread
     */
    public function setPinned($pinned)
    {
        $this->pinned = $pinned;

        return $this;
    }

    /**
     * Get pinned
     *
     * @return string
     */
    public function getPinned()
    {
        return $this->pinned;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Thread
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
     * Set author
     *
     * @param string $author
     * @return Thread
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Post
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
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set subboard
     *
     * @param \Site\ForumBundle\Entity\ForumSubboard $subboard
     * @return Thread
     */
    public function setSubboard(\Site\ForumBundle\Entity\ForumSubboard $subboard)
    {
        $this->subboard = $subboard;

        return $this;
    }

    /**
     * Get subboard
     *
     * @return \Site\ForumBundle\Entity\Subboard 
     */
    public function getSubboard()
    {
        return $this->subboard;
    }

    public function __toString()
    {
        return ($this->title);
    }

    /**
     * Add posts
     *
     * @param \Site\ForumBundle\Entity\ForumPost $posts
     * @return ForumThread
     */
    public function addPost(\Site\ForumBundle\Entity\ForumPost $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Site\ForumBundle\Entity\ForumPost $posts
     */
    public function removePost(\Site\ForumBundle\Entity\ForumPost $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
