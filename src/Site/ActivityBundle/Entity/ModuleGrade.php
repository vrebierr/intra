<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModuleGrade
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\ActivityBundle\Entity\ModuleGradeRepository")
 */
class ModuleGrade
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
	 * @ORM\Column(name="grade", type="string", length=5)
	 */
	private $grade;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="grades")
	 * @ORM\JoinColumn(nullable=false, name="user_id")
	 */
	private $student;

	/**
	 * @ORM\ManyToOne(targetEntity="Module", inversedBy="grades")
	 * @ORM\JoinColumn(nullable=false, name="module")
	 */
	private $module;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="credits", type="integer")
	 */
	private $credits;

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
	 * Set credits
	 *
	 * @param integer $credits
	 * @return ModuleGrade
	 */
	public function setCredits($credits)
	{
		$this->credits = $credits;

		return $this;
	}

	/**
	 * Get credits
	 *
	 * @return integer
	 */
	public function getCredits()
	{
		return $this->credits;
	}

	/**
	 * Set grade
	 *
	 * @param string $grade
	 * @return ModuleGrade
	 */
	public function setGrade($grade)
	{
		$this->grade = $grade;

		return $this;
	}

	/**
	 * Get grade
	 *
	 * @return string 
	 */
	public function getGrade()
	{
		return $this->grade;
	}

	/**
	 * Set student
	 *
	 * @param \Application\Sonata\UserBundle\Entity\User $student
	 * @return ModuleGrade
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
	 * Set module
	 *
	 * @param \Site\ActivityBundle\Entity\Module $module
	 * @return ModuleGrade
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
