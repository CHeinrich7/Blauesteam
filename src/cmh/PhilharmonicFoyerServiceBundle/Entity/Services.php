<?php
namespace cmh\PhilharmonicFoyerServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;

/**
 * @ORM\Entity(repositoryClass="cmh\PhilharmonicFoyerServiceBundle\Entity\Repository\ServicesRepository")
 * @ORM\Table(name="services")
 */
class Services
{
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
     * @ORM\Id
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false, type="integer")
     * @ORM\OneToOne(targetEntity="Staff")
     * @ORM\JoinColumn(name="id")
     *
     * @var Staff
     **/
    protected $staff;

    /**
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false, type="integer", name="first_staff")
     * @ORM\OneToOne(targetEntity="Staff")
     * @ORM\JoinColumn(name="id")
     *
     * @var Staff
     **/
    protected $firstStaff;

    /**
     * @ORM\Id
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false, type="integer")
     * @ORM\OneToOne(targetEntity="Concert")
     * @ORM\JoinColumn(name="id")
     *
     * @var Concert
     **/
    protected $concert;

    /**
     * @ORM\Id
     * @Constraints\NotBlank()
     * @ORM\Column(nullable = false, type="integer", name="groups")
     * @ORM\OneToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="id")
     *
     * @var Group
     **/
    protected $group;

    /**
     * @param boolean $isActive
     *
     * @return Services
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
     * @return Services
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
     * @param Concert $concert
     *
     * @return Services
     */
    public function setConcert ( $concert )
    {
        $this->concert = $concert;
        return $this;
    }

    /**
     * @return Concert
     */
    public function getConcert ()
    {
        return $this->concert;
    }

    /**
     * @param Group $group
     *
     * @return Services
     */
    public function setGroup ( $group )
    {
        $this->group = $group;
        return  $this;
    }

    /**
     * @return Group
     */
    public function getGroup ()
    {
        return $this->group;
    }

    /**
     * @param Staff $staff
     *
     * @return Services
     */
    public function setStaff ( $staff )
    {
        $this->staff = $staff;
        return $this;
    }

    /**
     * @return Staff
     */
    public function getStaff ()
    {
        return $this->staff;
    }

    /**
     * @param Staff $firstStaff
     *
     * @return Services
     */
    public function setFirstStaff ( $firstStaff )
    {
        $this->firstStaff = $firstStaff;
        return $this;
    }

    /**
     * @return Staff
     */
    public function getFirstStaff ()
    {
        return $this->firstStaff;
    }

}