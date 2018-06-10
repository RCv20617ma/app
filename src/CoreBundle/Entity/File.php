<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\Traits\CreatedByTrait;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * File
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\FileRepository")
 * @ORM\HasLifecycleCallbacks
 */
class File
{
    use TimestampableEntity, CreatedByTrait;

    /** @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="original_name", length=128)
     * @Assert\NotBlank
     */
    private $originalName;

    /**
     * @ORM\Column(type="string", name="directory_path", length=128, nullable=true)
     */
    private $directoryPath;

    /**
     * @ORM\Column(type="string", name="uuid", length=128, nullable=true)
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", name="full_path", length=128, nullable=true)
     */
    private $fullPath;

    /**
     * @ORM\Column(type="string", name="mime_type", length=128, nullable=true)
     */
    private $mimeType;

    /**
     * @ORM\Column(type="integer", name="size")
     */
    private $size;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $fileChanged;

    /**
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "application/x-pdf", "image/*"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     */
    public $file;

    /**
     * Set originalName
     *
     * @param string $originalName
     *
     * @return File
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @return mixed
     */
    public function getDirectoryPath()
    {
        return $this->directoryPath;
    }

    /**
     * @param $directoryPath
     * @return File
     */
    public function setDirectoryPath($directoryPath)
    {
        $this->directoryPath = $directoryPath;

        return $this;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return File
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set fullPath
     *
     * @param string $fullPath
     *
     * @return File
     */
    public function setFullPath($fullPath)
    {
        $this->fullPath = $fullPath;

        return $this;
    }

    /**
     * Get fullPath
     *
     * @return string
     */
    public function getFullPath()
    {
        return $this->fullPath;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return File
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
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
     * Set fileChanged
     *
     * @param boolean $fileChanged
     *
     * @return File
     */
    public function setFileChanged($fileChanged)
    {
        $this->fileChanged = $fileChanged;

        return $this;
    }

    /**
     * Get fileChanged
     *
     * @return boolean
     */
    public function getFileChanged()
    {
        return $this->fileChanged;
    }
}
