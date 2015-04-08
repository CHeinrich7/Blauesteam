<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use cmh\UserBundle\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\StaffRepository")
 * @ORM\Table(name="staff")
 *
 * @UniqueEntity(fields="user", message="One User can be only one Staff!")
 */
class Staff {

    /**
     * @ORM\Id
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false)
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id")
     *
     * @var User
     **/
    protected $user;

    /**
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false)
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="id")
     *
     * @var Group
     **/
    protected $group;

    /**
     * @param User $user
     *
     * @return Staff
     */
    public function setUser ( $user )
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser ()
    {
        return $this->user;
    }

    /**
     * @param Group $group
     *
     * @return Staff
     */
    public function setGroup ( $group )
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return Group
     */
    public function getGroup ()
    {
        return $this->group;
    }
} 