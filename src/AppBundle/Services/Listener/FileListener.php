<?php

namespace AppBundle\Services\Listener;


use AppBundle\Entity\File;
use Doctrine\ORM\Event\LifecycleEventArgs;

class FileListener
{
    public function preUpdate(File $file, LifecycleEventArgs $args)
    {
        $this->updateLastUpdate($file);
    }

    public function prePersist(File $file, LifecycleEventArgs $args)
    {
        $this->updateLastUpdate($file);
    }

    protected function updateLastUpdate(File $file)
    {
        $file->setLastUpdate(new \DateTime());
    }
}
