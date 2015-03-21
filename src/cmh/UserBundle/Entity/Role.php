<?php

namespace cmh\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role as SecurityRole;
use Symfony\Component\Validator\Constraints;


/**
 * @ORM\Entity(repositoryClass="cmh\UserBundle\Entity\Role")
 * @ORM\Table(name="userrole")
 */
class Role extends SecurityRole
{
    const ROLE_APPLICANT    = 'ROLE_APPLICANT';
    const ROLE_STAFF        = 'ROLE_STAFF';
    const ROLE_CHARGER      = 'ROLE_CHARGER';
    const ROLE_ADMIN        = 'ROLE_ADMIN';
    const ROLE_SUPER_ADMIN  = 'ROLE_SUPER_ADMIN';

    /**
     * Constructor.
     *
     * @param string $role The role name
     */
    public function __construct ( $role )
    {
        $this->role = (string) $role;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=16)
     * @Constraints\NotBlank()
     * @var string
     */
    private $role;

    /**
     * @param string $role
     *
     * @return Role
     */
    public function setRole ( $role )
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole ()
    {
        return $this->role;
    }
}