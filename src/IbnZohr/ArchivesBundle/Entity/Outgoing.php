<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Outgoing
 *
 * @ORM\Table(name="outgoing")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\OutgoingRepository")
 */
class Outgoing {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="outDate", type="datetime", nullable=true)
     */
    private $outDate;

    /**
     * @var string
     *
     * @ORM\Column(name="requester", type="string", length=255, nullable=true)
     */
    private $requester;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="returningPerson", type="string", length=255, nullable=true)
     */
    private $returningPerson;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="returnDate", type="datetime", nullable=true)
     */
    private $returnDate;

    /**
     * @ORM\ManyToOne(targetEntity="Storing", inversedBy="outgoings")
     * @ORM\JoinColumn(name="storing_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $storing;

    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $service;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set outDate
     *
     * @param \DateTime $outDate
     *
     * @return Outgoing
     */
    public function setOutDate($outDate) {
        $this->outDate = $outDate;

        return $this;
    }

    /**
     * Get outDate
     *
     * @return \DateTime
     */
    public function getOutDate() {
        return $this->outDate;
    }

    /**
     * Set requester
     *
     * @param string $requester
     *
     * @return Outgoing
     */
    public function setRequester($requester) {
        $this->requester = $requester;

        return $this;
    }

    /**
     * Get requester
     *
     * @return string
     */
    public function getRequester() {
        return $this->requester;
    }

    /**
     * Set storing
     *
     * @param Storing $storing
     *
     * @return Property
     */
    public function setStoring(Storing $storing = null) {
        $this->storing = $storing;

        return $this;
    }

    /**
     * Get storing
     *
     * @return Storing
     */
    public function getStoring() {
        return $this->storing;
    }

    /**
     * Set service
     *
     * @param Service $service
     *
     * @return Property
     */
    public function setService(Service $service = null) {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return Service
     */
    public function getService() {
        return $this->service;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Outgoing
     */
    public function setObservation($observation) {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation() {
        return $this->observation;
    }

    /**
     * Set returningPerson
     *
     * @param string $returningPerson
     *
     * @return Outgoing
     */
    public function setReturningPerson($returningPerson) {
        $this->returningPerson = $returningPerson;

        return $this;
    }

    /**
     * Get returningPerson
     *
     * @return string
     */
    public function getReturningPerson() {
        return $this->ReturningPerson;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     *
     * @return Outgoing
     */
    public function setReturnDate($returnDate) {
        $this->outDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime
     */
    public function getReturnDate() {
        return $this->returnDate;
    }

}
