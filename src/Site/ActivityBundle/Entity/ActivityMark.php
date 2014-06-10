<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityMark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ActivityBundle\Entity\ActivityMarkRepository")
 */
class ActivityMark
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
	 * @var integer
	 *
	 * @ORM\Column(name="mark", type="integer")
	 */
	private $mark;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="marks")
	 * @ORM\JoinColumn(nullable=false, name="user_id")
	 */
	private $student;

	/**
	 * @ORM\ManyToOne(targetEntity="Activity", inversedBy="marks")
	 * @ORM\JoinColumn(nullable=false, name="activity")
	 */
	private $activity;

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
	 * Set mark
	 *
	 * @param integer $mark
	 * @return ActivityMark
	 */
	public function setMark($mark)
	{
		$this->mark = $mark;

		return $this;
	}

	/**
	 * Get mark
	 *
	 * @return integer 
	 */
	public function getMark()
	{
		return $this->mark;
	}

	/**
	 * Set student
	 *
	 * @param \Application\Sonata\UserBundle\Entity\User $student
	 * @return ActivityMark
	 */
	public function setStudent(\Application\Sonata\UserBundle\Entity\User $student)
	{
		$this->student = $student;

		return $this;
	}

	/**
	 * Get student
	 *
	 * @return \Application\Sonata\UserBundle\Entity\User 
	 */
	public function getStudent()
	{
		return $this->student;
	}

	/**
	 * Set activity
	 *
	 * @param \Site\ActivityBundle\Entity\Activity $activity
	 * @return ActivityMark
	 */
	public function setActivity(\Site\ActivityBundle\Entity\Activity $activity)
	{
		$this->activity = $activity;

		return $this;
	}

	/**
	 * Get activity
	 *
	 * @return \Site\ActivityBundle\Entity\Activity 
	 */
	public function getActivity()
	{
		return $this->activity;
	}
}
