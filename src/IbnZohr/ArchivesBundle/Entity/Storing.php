<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use IbnZohr\ArchivesBundle\Entity\User as User;

/**
 * Storing
 *
 * @ORM\Table(name="storing")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\StoringRepository")
 */
class Storing
{
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
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="Hospitalization", cascade={"persist"})
     * @ORM\JoinColumn(name="hospitalization_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $hospitalization;

    /**
     * @ORM\OneToOne(targetEntity="Exam", cascade={"persist"})
     * @ORM\JoinColumn(name="exam_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $exam;

    /**
     * @ORM\OneToOne(targetEntity="Consultation", cascade={"persist"})
     * @ORM\JoinColumn(name="consultation_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $consultation;

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="storing")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="Outgoing", mappedBy="storing")
     */
    private $outgoings;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Storing
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Storing
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Property
     */
    public function setUser(User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set hospitalization
     *
     * @param Hospitalization $hospitalization
     *
     * @return Property
     */
    public function setHospitalization(Hospitalization $hospitalization = null) {
        $this->hospitalization = $hospitalization;

        return $this;
    }

    /**
     * Get hospitalization
     *
     * @return Hospitalization
     */
    public function getHospitalization() {
        return $this->hospitalization;
    }

    /**
     * Set exam
     *
     * @param Exam $exam
     *
     * @return Property
     */
    public function setExam(Exam $exam = null) {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return Exam
     */
    public function getExam() {
        return $this->exam;
    }

    /**
     * Set consultation
     *
     * @param Consultation $consultation
     *
     * @return Property
     */
    public function setConsultation(Consultation $consultation = null) {
        $this->consultation = $consultation;

        return $this;
    }

    /**
     * Get consultation
     *
     * @return Consultation
     */
    public function getConsultation() {
        return $this->consultation;
    }

    /**
     * Add document
     *
     * @param Document $document
     *
     * @return Property
     */
    public function addDocument(Document $document) {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param Document $document
     */
    public function removeDocument(Document $document) {
        $this->documents->removeElement($document);
    }

    /**
     * Get document
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocument() {
        return $this->documents;
    }


    /**
     * Add outgoing
     *
     * @param Outgoing $outgoing
     *
     * @return Property
     */
    public function addOutgoing(Outgoing $outgoing) {
        $this->outgoings[] = $outgoing;

        return $this;
    }

    /**
     * Remove outgoing
     *
     * @param Outgoing $outgoing
     */
    public function removeOutgoing(Outgoing $outgoing) {
        $this->outgoings->removeElement($outgoing);
    }

    /**
     * Get outgoing
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOutgoing() {
        return $this->outgoings;
    }

}

