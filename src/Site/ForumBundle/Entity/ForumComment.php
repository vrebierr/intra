<?php

namespace Site\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumComment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ForumBundle\Entity\ForumCommentRepository")
 */
class ForumComment
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
     * @ORM\ManyToOne(targetEntity="ForumPost", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false, name="post_id")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="comments", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, name="author")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
     * Set author
     *
     * @param string $author
     * @return ForumComment
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
     * Set content
     *
     * @param string $content
     * @return ForumComment
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
     * Set date
     *
     * @param \DateTime $date
     * @return ForumComment
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
     * Set post
     *
     * @param \Site\ForumBundle\Entity\ForumPost $post
     * @return ForumComment
     */
    public function setPost(\Site\ForumBundle\Entity\ForumPost $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Site\ForumBundle\Entity\ForumPost 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set thread
     *
     * @param \Site\ForumBundle\Entity\ForumThread $thread
     * @return ForumComment
     */
    public function setThread(\Site\ForumBundle\Entity\ForumThread $thread)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \Site\ForumBundle\Entity\ForumThread 
     */
    public function getThread()
    {
        return $this->thread;
    }

    public function __toString()
    {
        return (strval($this->id));
    }
}
