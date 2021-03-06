<?php

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

use FOS\MessageBundle\Model\ParticipantInterface;

use FR3D\LdapBundle\Model\LdapUserInterface;

class User extends BaseUser implements LdapUserInterface, ParticipantInterface
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var integer peers
     */
    public $peers = 0;

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
     * @var \DateTime
     */
    protected $dateOfBirth;

    /**
     * @var \Site\ForumBundle\Entity\ForumThread
     */
    protected $threads;

    /**
     * @var \Site\ForumBundle\Entity\ForumPost
     */
    protected $posts;

    /**
     * @var \Site\ForumBundle\Entity\ForumComment
     */
    protected $comments;

    /**
     * @var \Site\TicketBundle\Entity\TicketTicket
     */
    protected $tickets;

    /**
     * @var \Site\TicketBundle\Entity\TicketMessage
     */
    protected $messages;

    /**
     * @var \Site\ActivityBundle\Entity\Module
     */
    protected $modules;

    /**
     * @var \Site\ActivityBundle\Entity\Activity
     */
    protected $activities;

    /**
     * @var \Site\ActivityBundle\Entity\ActivityGroup
     */
     protected $activity_groups;

    /**
     * @var \Site\IntraBundle\Entity\Event
     */
    protected $events;

    /**
     * @var \Site\ActivityBundle\Entity\ModuleGrade
     */
    protected $grades;

    /**
     * @var \Site\ActivityBundle\Entity\ActivityMark
     */
    protected $marks;

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
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activity_groups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->marks = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Stringer
     */
    public function __toString()
    {
        return $this->getUsername();
    }
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
     * @param \DateTime or string $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        if ($dateOfBirth instanceOf \DateTime)
            $this->dateOfBirth = $dateOfBirth;
        else
        {
            $date = substr($dateOfBirth, 0, 8);
            $this->dateOfBirth = new \DateTime($date);
        }
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
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

    /**
     * Add modules
     *
     * @param \Site\ActivityBundle\Entity\Module $modules
     * @return User
     */
    public function addModule(\Site\ActivityBundle\Entity\Module $modules)
    {
        $this->modules[] = $modules;

        return $this;
    }

    /**
     * Remove modules
     *
     * @param \Site\ActivityBundle\Entity\Module $modules
     */
    public function removeModule(\Site\ActivityBundle\Entity\Module $modules)
    {
        $this->modules->removeElement($modules);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Add activities
     *
     * @param \Site\ActivityBundle\Entity\Activity $activities
     * @return User
     */
    public function addActivity(\Site\ActivityBundle\Entity\Activity $activities)
    {
        $this->ativities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \Site\ActivityBundle\Entity\Activity $activities
     */
    public function removeActivity(\Site\ActivityBundle\Entity\Activity $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Add activity_groups
     *
     * @param \Site\ActivityBundle\Entity\ActivityGroup $activityGroups
     * @return User
     */
    public function addActivityGroup(\Site\ActivityBundle\Entity\ActivityGroup $activityGroups)
    {
        $this->activity_groups[] = $activityGroups;

        return $this;
    }

    /**
     * Remove activity_groups
     *
     * @param \Site\ActivityBundle\Entity\ActivityGroup $activityGroups
     */
    public function removeActivityGroup(\Site\ActivityBundle\Entity\ActivityGroup $activityGroups)
    {
        $this->activity_groups->removeElement($activityGroups);
    }

    /**
     * Get activity_groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivityGroups()
    {
        return $this->activity_groups;
    }

    /**
     * Add grade
     *
     * @param \Site\ActivityBundle\Entity\ModuleGrade $grade
     * @return User
     */
    public function addGrade(\Site\ActivityBundle\Entity\ModuleGrade $grade)
    {
        $this->grades[] = $grade;

        return $this;
    }

    /**
     * Remove grade
     *
     * @param \Site\ActivityBundle\Entity\ModuleGrade $grade
     */
    public function removeGrade(\Site\ActivityBundle\Entity\ModuleGrade $grade)
    {
        $this->grades->removeElement($grade);
    }

    /**
     * Get grades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * Add mark
     *
     * @param \Site\ActivityBundle\Entity\ActivityMark $mark
     * @return User
     */
    public function addMark(\Site\ActivityBundle\Entity\ActivityMark $mark)
    {
        $this->marks[] = $mark;

        return $this;
    }

    /**
     * Remove mark
     *
     * @param \Site\ActivityBundle\Entity\ActivityMark $mark
     */
    public function removeMark(\Site\ActivityBundle\Entity\ActivityMark $mark)
    {
        $this->marks->removeElement($mark);
    }

    /**
     * Get marks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarks()
    {
        return $this->marks;
    }

}
