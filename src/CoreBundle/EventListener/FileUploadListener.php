<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\File;
use CoreBundle\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class FileUploadListener
{
    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        if (!$entity instanceof File) {
            return;
        }

        $file = $entity->file;

        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file);
            $entity->setDirectoryPath($this->uploader->getTargetDirectory());
            $entity->setMimeType($file->getClientMimeType());
            $entity->setOriginalName($file->getClientOriginalName());
            $entity->setUuid($fileName);
            $entity->setFullPath($entity->getDirectoryPath() . '/' . $entity->getUuid());
        }
    }
}