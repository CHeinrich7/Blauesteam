<?php

namespace cmh\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     * @Constraints\NotBlank()
     * @Constraints\Length(min = "5")
     */
    private $username;

    /**
     * algorithm: sha512
     * encode_as_base64: true
     *
     * @ORM\Column(type="string", length=128)
     * @Constraints\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(name="is_superuser", type="boolean", options={"default"=0})
     */
    private $isSuperUser;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="is_deleted", type="boolean")
     */
    private $isDeleted;

    /**
     * @ORM\Column(name="is_deletable", type="boolean")
     */
    private $isDeletable;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @ORM\OneToOne(targetEntity="Profile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Constraints\Valid
     */
    private $profile;

    /**
     * @param integer $id
     *
     * @return User
     */
    public function setId ( $id )
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive ( $isActive )
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive ()
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isDeletable
     *
     * @return User
     */
    public function setIsDeletable ( $isDeletable )
    {
        $this->isDeletable = $isDeletable;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsDeletable ()
    {
        return $this->isDeletable;
    }

    /**
     * @param mixed $isDeleted
     *
     * @return User
     */
    public function setIsDeleted ( $isDeleted )
    {
        $this->isDeleted = $isDeleted;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsDeleted ()
    {
        return $this->isDeleted;
    }

    /**
     * @param boolean $isSuperUser
     *
     * @return User
     */
    public function setIsSuperUser ( $isSuperUser )
    {
        $this->isSuperUser = $isSuperUser;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsSuperUser ()
    {
        return $this->isSuperUser;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword ( $password )
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword ()
    {
        return $this->password;
    }

    /**
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword ( $plainPassword )
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword ()
    {
        return $this->plainPassword;
    }

    /**
     * @param Profile $profile
     *
     * @return User
     */
    public function setProfile ( Profile $profile )
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return Profile
     */
    public function getProfile ()
    {
        return $this->profile;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername ( $username )
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername ()
    {
        return $this->username;
    }
} 