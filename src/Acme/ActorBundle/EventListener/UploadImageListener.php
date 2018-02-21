<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 22/12/17
 * Time: 11:02
 */

namespace Acme\ActorBundle\EventListener;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Acme\ActorBundle\Entity\Actors;
use Acme\ActorBundle\ImageUpload;

/**
 * Class UploadImageListener
 * @package Acme\ActorBundle\EventListener
 */
class UploadImageListener
{
    private $uploader;

    /**
     * UploadImageListener constructor.
     * @param ImageUpload $uploader
     */
    public function __construct(ImageUpload $uploader)
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
        // upload only works for Product entities
        if (!$entity instanceof Actors) {
            return;
        }

        $file = $entity->getImage();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setImage($fileName);
    }
}