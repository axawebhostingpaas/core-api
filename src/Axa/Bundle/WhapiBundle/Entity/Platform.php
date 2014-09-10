<?php

namespace Axa\Bundle\WhapiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Platform
 *
 * @ORM\Table(name="platform")
 * @ORM\Entity(repositoryClass="Axa\Bundle\WhapiBundle\Entity\PlatformRepository")
 */
class Platform
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="remoteId", type="integer", unique=true, nullable=false)
     *
     */
    private $remoteId;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="platforms")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="platforms")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", nullable=false)
     */
    private $offer;


    /**
     * @ORM\OneToMany(targetEntity="Vm", mappedBy="platform")
     */
    private $virtualMachines;


    public function __construct()
    {
        $this->virtualMachines = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set remoteId
     *
     * @param $remoteId
     * @return $this
     */
    public function setRemoteId($remoteId)
    {
        $this->remoteId = $remoteId;

        return $this;
    }

    /**
     * Get remoteId
     *
     * @return integer
     */
    public function getRemoteId()
    {
        return $this->remoteId;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Platform
     */
    public function setUser( User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get virtualMachines
     *
     * @return ArrayCollection
     */
    public function getVirtualMachines()
    {
        return $this->virtualMachines;
    }

    /**
     * Set offer
     *
     * @param Offer $offer
     */
    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get offer
     *
     * @return Offer
     */
    public function getOffer()
    {
        return $this->offer;
    }
}
