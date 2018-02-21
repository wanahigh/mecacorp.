<?php


namespace AcmeActuBundle\Controller\Entity\ImageUpload;

use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Class ImageUpload
 * @package AcmeActuBundle\Controller\Entity\ImageUpload
 */
class ImageUpload
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}