<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;

/**
 * @ORM\Entity(repositoryClass="cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\GroupRepository")
 * @ORM\Table(name="cluster")
 */
class Group {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var boolean
     */
    protected $isActive  = true;

    /**
     * @ORM\Column(name="is_deleted", type="boolean")
     * @var boolean
     */
    protected $isDeleted = false;

    /**
     * @ORM\Column(type="string", length=32)
     * @Constraints\NotBlank()
     * @var string
     */
    protected $name;

    /**
     * @param integer $id
     *
     * @return Group
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
     * @return Group
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
     * @param boolean $isDeleted
     *
     * @return Group
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
     * @param string $name
     *
     * @return Group
     */
    public function setName ( $name )
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }



}