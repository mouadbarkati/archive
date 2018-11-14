<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\ConsultationRepository")
 */
class Consultation {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="consNumber", type="integer", nullable=true)
     */
    private $consNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="consDate", type="datetime", nullable=true)
     */
    private $consDate;

    /**
     * @var int
     *
     * @ORM\Column(name="consYear", type="integer", nullable=true)
     */
    private $consYear;

    /**
     * @ORM\OneToOne(targetEntity="Patient" , cascade={"persist"})
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $patient;

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
     * Set consNumber
     *
     * @param int $consNumber
     *
     * @return Consultation
     */
    public function setConsNumber($consNumber) {
        $this->consNumber = $consNumber;

        return $this;
    }

    /**
     * Get consNumber
     *
     * @return int
     */
    public function getConsNumber() {
        return $this->consNumber;
    }

    /**
     * Set consDate
     *
     * @param \DateTime $consDate
     *
     * @return Consultation
     */
    public function setConsDate($consDate) {
        $this->consDate = $consDate;

        return $this;
    }

    /**
     * Get consDate
     *
     * @return \DateTime
     */
    public function getConsDate() {
        return $this->consDate;
    }

    /**
     * Set consYear
     *
     * @param integer $consYear
     *
     * @return Consultation
     */
    public function setConsYear($consYear) {
        $this->consYear = $consYear;

        return $this;
    }

    /**
     * Get consYear
     *
     * @return int
     */
    public function getConsYear() {
        return $this->consYear;
    }

    /**
     * Set patient
     *
     * @param Patient $patient
     *
     * @return Property
     */
    public function setPatient(Patient $patient = null) {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return Patient
     */
    public function getPatient() {
        return $this->patient;
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

}
