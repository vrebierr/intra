<?php

namespace Site\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ForumBundle\Entity\ForumPostRepository")
 */
class ForumPost
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
     * @ORM\ManyToOne(targetEntity="ForumThread", inversedBy="posts")
     * @ORM\JoinColumn(nullable=false, name="thread_id")
     */
    private $thread;

    /**
     * @ORM\OneToMany(targetEntity="ForumComment", mappedBy="post", cascade={"persist", "remove"})
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"})
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
     * Set author
     *
     * @param string $author
     * @return Post
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
     * Set thread
     *
     * @param \Site\ForumBundle\Entity\ForumThread $thread
     * @return Post
     */
    public function setThread(\Site\ForumBundle\Entity\ForumThread $thread)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \Site\ForumBundle\Entity\Thread 
     */
    public function getThread()
    {
        return $this->thread;
    }

    public function __toString()
    {
        return (strval($this->id));
    }

    /**
     * Add comments
     *
     * @param \Site\ForumBundle\Entity\ForumComment $comments
     * @return ForumPost
     */
    public function addComment(\Site\ForumBundle\Entity\ForumComment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Site\ForumBundle\Entity\ForumComment $comments
     */
    public function removeComment(\Site\ForumBundle\Entity\ForumComment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
