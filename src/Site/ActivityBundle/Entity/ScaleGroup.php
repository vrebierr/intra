<?php

namespace Site\ActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScaleGroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ScaleGroup
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
     * @ORM\ManytoOne(targetEntity="Scale")
     * @ORM\JoinColumn(nullable=false, name="scale_id")
     */
    private $scale;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @ORM\ManytoOne(targetEntity="ActivityGroup")
     * @ORM\JoinColumn(nullable=false, name="group_id")
     */
    private $group;

    /**
     * @ORM\ManytoOne(targetEntity="\Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false, name="rater_id")
     */
    private $rater;


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
     * Set note
     *
     * @param integer $note
     * @return ScaleGroup
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set scale
     *
     * @param \Site\ActivityBundle\Entity\Scale $scale
     * @return ScaleGroup
     */
    public function setScale(\Site\ActivityBundle\Entity\Scale $scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return \Site\ActivityBundle\Entity\Scale 
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * Set group
     *
     * @param \Site\ActivityBundle\Entity\ActivityGroup $group
     * @return ScaleGroup
     */
    public function setGroup(\Site\ActivityBundle\Entity\ActivityGroup $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Site\ActivityBundle\Entity\ActivityGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set rater
     *
     * @param \Application\Sonata\UserBundle\Entity\User $rater
     * @return ScaleGroup
     */
    public function setrRater(\Application\Sonata\UserBundle\Entity\User $rater)
    {
        $this->rater = $rater;

        return $this;
    }

    /**
     * Get rater
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getRater()
    {
        return $this->rater;
    }
}
