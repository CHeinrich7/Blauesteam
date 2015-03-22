<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\ConcertRepository")
 * @ORM\Table(name="concert")
 */
class Concert {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive  = true;

    /**
     * @ORM\Column(name="is_deleted", type="boolean")
     */
    protected $isDeleted = false;

    /**
     * @var \datetime
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="groups", mappedBy="id")
     */
    protected $groups;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $info1;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $info2;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $info3;

    public function __construct()
    {
        $this->setGroups( new ArrayCollection() );
    }

    /**
     * @param \datetime $date
     */
    public function setDate ( $date )
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \datetime
     */
    public function getDate ()
    {
        return $this->date;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $groups
     *
     * @return Concert
     */
    protected function setGroups ( $groups )
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGroups ()
    {
        return $this->groups;
    }


    /**
     * @param Group $group
     *
     * @return Concert
     */
    public function addGroup(Group $group)
    {
        $this->groups->add($group);
        return $this;
    }
    /**
     * @param Group $group
     *
     * @return Concert
     */
    public function removeGroup(Group $group)
    {
        $this->groups->removeElement($group);
        return $this;
    }

    /**
     * @param boolean $id
     *
     * @return Concert
     */
    public function setId ( $id )
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param boolean $isActive
     *
     * @return Concert
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
     * @return Concert
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
     * @param string $info1
     *
     * @return Concert
     */
    public function setInfo1 ( $info1 )
    {
        $this->info1 = $info1;
        return $this;
    }

    /**
     * @return string
     */
    public function getInfo1 ()
    {
        return $this->info1;
    }

    /**
     * @param string $info2
     *
     * @return Concert
     */
    public function setInfo2 ( $info2 )
    {
        $this->info2 = $info2;
        return $this;
    }

    /**
     * @return string
     */
    public function getInfo2 ()
    {
        return $this->info2;
    }

    /**
     * @param string $info3
     *
     * @return Concert
     */
    public function setInfo3 ( $info3 )
    {
        $this->info3 = $info3;
        return $this;
    }

    /**
     * @return string
     */
    public function getInfo3 ()
    {
        return $this->info3;
    }
}