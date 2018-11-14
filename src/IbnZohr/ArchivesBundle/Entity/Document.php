<?php

namespace IbnZohr\ArchivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="IbnZohr\ArchivesBundle\Repository\DocumentRepository")
 */
class Document
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Storing", inversedBy="documents")
     * @ORM\JoinColumn(name="storing_id", referencedColumnName="id",onDelete="SET NULL")
     */
    private $storing;


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
     * Set name
     *
     * @param string $name
     *
     * @return Document
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}

