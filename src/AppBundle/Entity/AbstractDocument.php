<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractDocument
 *
 * @ORM\Table(name="abstract_document")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbstractDocumentRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap(
 *   {
 *     AppBundle\Entity\CarDocument::DISCRIMINATOR = AppBundle\Entity\CarDocument::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
abstract class AbstractDocument
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=true)
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    protected $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="AbstractDocumentType")
     */
    protected $documentType;

    /**
     * @ORM\ManyToMany(targetEntity="File")
     */
    protected $files;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return AbstractDocument
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return AbstractDocument
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set documentType
     *
     * @param \AppBundle\Entity\AbstractDocumentType $documentType
     *
     * @return AbstractDocument
     */
    public function setDocumentType(\AppBundle\Entity\AbstractDocumentType $documentType = null)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return \AppBundle\Entity\AbstractDocumentType
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Add file
     *
     * @param \AppBundle\Entity\File $file
     *
     * @return AbstractDocument
     */
    public function addFile(\AppBundle\Entity\File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * Remove file
     *
     * @param \AppBundle\Entity\File $file
     */
    public function removeFile(\AppBundle\Entity\File $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }
}
