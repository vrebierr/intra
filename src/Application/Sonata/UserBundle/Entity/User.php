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
}
