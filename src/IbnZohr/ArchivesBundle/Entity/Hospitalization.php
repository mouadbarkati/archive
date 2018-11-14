<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospitalization
 *
 * @ORM\Table(name="hospitalization")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\HospitalizationRepository")
 */
class Hospitalization {

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
     * @ORM\Column(name="hospNumber", type="integer", nullable=true)
     */
    private $hospNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="hospYear", type="integer", nullable=true)
     */
    private $hospYear;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hospDate", type="datetime", nullable=true)
     */
    private $hospDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="outDate", type="datetime", nullable=true)
     */
    private $outDate;

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
     * Set hospNumber
     *
     * @param integer $hospNumber
     *
     * @return Hospitalization
     */
    public function setHospNumber($hospNumber) {
        $this->hospNumber = $hospNumber;

        return $this;
    }

    /**
     * Get hospNumber
     *
     * @return int
     */
    public function getHospNumber() {
        return $this->hospNumber;
    }

    /**
     * Set hospYear
     *
     * @param integer $hospYear
     *
     * @return Hospitalization
     */
    public function setHospYear($hospYear) {
        $this->hospYear = $hospYear;

        return $this;
    }

    /**
     * Get hospYear
     *
     * @return int
     */
    public function getHospYear() {
        return $this->hospYear;
    }

    /**
     * Set hospDate
     *
     * @param \DateTime $hospDate
     *
     * @return Hospitalization
     */
    public function setHospDate($hospDate) {
        $this->hospDate = $hospDate;

        return $this;
    }

    /**
     * Get hospDate
     *
     * @return \DateTime
     */
    public function getHospDate() {
        return $this->hospDate;
    }

    /**
     * Set outDate
     *
     * @param \DateTime $outDate
     *
     * @return Hospitalization
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
