<?php

namespace Site\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\MessageBundle\Entity\Thread as BaseThread;

/**
 * Thread
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\MessageBundle\Entity\ThreadRepository")
 */
class Thread extends BaseThread
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    protected $type = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="type_string", type="string")
     */
    protected $typeString = 'TYPE_STANDARD';

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     */
    protected $createdBy;

    /**
     * @ORM\OneToMany(targetEntity="Site\MessageBundle\Entity\Message", mappedBy="thread")
     * @var Message[]|\Doctrine\Common\Collections\Collection
     */
    protected $messages;

    /**
     * @ORM\OneToMany(targetEntity="Site\MessageBundle\Entity\ThreadMetadata", mappedBy="thread", cascade={"all"})
     * @var ThreadMetadata[]|\Doctrine\Common\Collections\Collection
     */
    protected $metadata;

    const TYPE_STANDARD = 1;
    const TYPE_CORRECTION = 2;
    const TYPE_ADM = 3;

    static public $types = array(
        self::TYPE_STANDARD => 'TYPE_STANDARD',
        self::TYPE_CORRECTION => 'TYPE_STANDARD',
        self::TYPE_ADM => 'TYPE_STANDARD',
    );

    /**
     * Set type
     *
     * @param integer $type
     * @return Thread
     */
    public function setType($type)
    {
        $this->type = $type;
        $this->typeString = $types[$type];

        return $this;
    }

    /**
     * Set typeString
     *
     * @param string $typeString
     * @return Thread
     */
    public function setTypeString($typeString)
    {
        $this->typeString = $typeString;
        $this->type = array_search($typeString, $types);

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get typeString
     *
     * @return string
     */
    public function getTypeString()
    {
        return $this->typeString;
    }

    public function __toString()
    {
        return $this->subject;
    }
}
