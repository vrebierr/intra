<?php

namespace Site\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\MessageBundle\Entity\Message as BaseMessage;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\MessageBundle\Entity\MessageRepository")
 */
class Message extends BaseMessage
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
     *      * @ORM\ManyToOne(targetEntity="Site\MessageBundle\Entity\Thread", inversedBy="messages")
     * @var ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @var ParticipantInterface
     */
    protected $author;

    /**
     * @ORM\OneToMany(targetEntity="Site\MessageBundle\Entity\MessageMetadata", mappedBy="message", cascade={"all"})
     * @var MessageMetadata
     */
    protected $metadata;
}
