<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\GroupRepository")
 * @ORM\Table(name="groups")
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
     * @ORM\OneToMany(targetEntity="Staff", mappedBy="group")
     * @var ArrayCollection
     **/
    protected $staffs;

    /**
     * @ORM\ManyToMany(targetEntity="Concert", mappedBy="groups")
     * @var ArrayCollection
     */
    protected $concerts = null;

    public function __construct($group = null)
    {
        $this->setConcerts( new ArrayCollection() );
        $this->setStaffs( new ArrayCollection() );

        if($group != null) $this->name = $group;
    }

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
     * @param ArrayCollection $staffs
     *
     * @return Group
     */
    public function setStaffs ( ArrayCollection $staffs )
    {
        $this->staffs = $staffs;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStaffs ()
    {
        return $this->staffs;
    }

    /**
     * @param Staff $staff
     *
     * @return Group
     */
    public function addStaff ( Staff $staff )
    {
        $staff->setGroup($this);
        return $this;
    }

    /**
     * @param ArrayCollection $concerts
     *
     * @return Group
     */
    protected function setConcerts ( ArrayCollection $concerts )
    {
        $this->groups = $concerts;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getConcerts ()
    {
        return $this->concerts;
    }

    /**
     * @param Concert $concert
     *
     * @return Group
     */
    public function addConcert ( Concert $concert )
    {
        $concert->addGroup($this);
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

}