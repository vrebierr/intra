<?php

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use FR3D\LdapBundle\Model\LdapUserInterface;

class User extends BaseUser implements LdapUserInterface
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $dn
     */
    private $dn;

    /**
     * @var string autotoken
     */
    private $autoLoginToken;

	/**
     * @var string autotoken
     */
    private $autoLoginUrl;

    /**
     * @var string $avatar
     */
    protected $avatar;

    /**
     * @var \Site\Intra\ForumBundle\Entity\ForumThread
     */
    protected $threads;

    /**
     * @var \Site\Intra\ForumBundle\Entity\ForumPost
     */
    protected $posts;

    /**
     * @var \Site\Intra\ForumBundle\Entity\ForumComment
     */
    protected $comments;

    /**
     * @var \Site\Intra\TicketBundle\Entity\TicketTicket
     */
    protected $tickets;

    /**
     * @var \Site\Intra\TicketBundle\Entity\TicketMessage
     */
    protected $messages;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setAutoLoginToken($token)
    {
        $this->autoLoginToken = $token;
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoLoginToken()
    {
        return $this->autoLoginToken;
    }

	/**
     * {@inheritDoc}
     */
    public function setAutoLoginUrl($url)
    {
        $this->autoLoginUrl = $url;
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoLoginUrl()
    {
        return $this->autoLoginUrl;
	}

    /**
     * {@inheritDoc}
     */
    public function setDn($dn)
    {
        $this->dn = $dn;
    }

    /**
     * {@inheritDoc}
     */
    public function getDn()
    {
        return $this->dn;
    }

    /**
     * {@inheritDoc}
     */
    public function setAvatar($avatar)
    {
        $this->avatar = base64_encode($avatar);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->threads = new \Doctrine\Common\Collections\ArrayCollection();
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messsages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add threads
     *
     * @param \Site\ForumBundle\Entity\ForumThread $threads
     * @return User
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

    /**
     * Add posts
     *
     * @param \Site\ForumBundle\Entity\ForumPost $posts
     * @return User
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

    /**
     * Add tickets
     *
     * @param \Site\TicketBundle\Entity\TicketTicket $tickets
     * @return User
     */
    public function addTicket(\Site\TicketBundle\Entity\TicketTicket $tickets)
    {
        $this->tickets[] = $tickets;

        return $this;
    }

    /**
     * Remove tickets
     *
     * @param \Site\TicketBundle\Entity\TicketTicket $tickets
     */
    public function removeTicket(\Site\TicketBundle\Entity\TicketTicket $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Add messages
     *
     * @param \Site\TicketBundle\Entity\TicketMessage $messages
     * @return User
     */
    public function addMessage(\Site\TicketBundle\Entity\TicketMessage $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Site\TicketBundle\Entity\TicketMessage $messages
     */
    public function removeMessage(\Site\TicketBundle\Entity\TicketMessage $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add comments
     *
     * @param \Site\ForumBundle\Entity\ForumComment $comments
     * @return User
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
