<?php

namespace Site\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;
use FOS\MessageBundle\Model\MessageInterface;
use FOS\MessageBundle\Model\ParticipantInterface;

/**
 * MessageMetadata
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\MessageBundle\Entity\MessageMetadataRepository")
 */
class MessageMetadata extends BaseMessageMetadata
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
     * @ORM\ManyToOne(targetEntity="Site\MessageBundle\Entity\Message", inversedBy="metadata")
     * @var MessageInterface
     */
    protected $message;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @var ParticipantInterface
     */
    protected $participant;
}
