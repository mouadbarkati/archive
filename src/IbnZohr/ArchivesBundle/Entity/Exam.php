<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exam
 *
 * @ORM\Table(name="exam")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\ExamRepository")
 */
class Exam {

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
     * @ORM\Column(name="examNumber", type="integer", nullable=true)
     */
    private $examNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="examDate", type="datetime", nullable=true)
     */
    private $examDate;

    /**
     * @var int
     *
     * @ORM\Column(name="examYear", type="integer", nullable=true)
     */
    private $examYear;

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
     * Set examNumber
     *
     * @param int $examNumber
     *
     * @return Exam
     */
    public function setExamNumber($examNumber) {
        $this->examNumber = $examNumber;

        return $this;
    }

    /**
     * Get examNumber
     *
     * @return int
     */
    public function getExamNumber() {
        return $this->examNumber;
    }

    /**
     * Set examDate
     *
     * @param \DateTime $examDate
     *
     * @return Exam
     */
    public function setExamDate($examDate) {
        $this->examDate = $examDate;

        return $this;
    }

    /**
     * Get examDate
     *
     * @return \DateTime
     */
    public function getExamDate() {
        return $this->examDate;
    }

    /**
     * Set examYear
     *
     * @param integer $examYear
     *
     * @return Exam
     */
    public function setExamYear($examYear) {
        $this->examYear = $examYear;

        return $this;
    }

    /**
     * Get examYear
     *
     * @return int
     */
    public function getExamYear() {
        return $this->examYear;
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
