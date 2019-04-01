<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File as HttpFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
class File
{
    /**
     * @var int
     */
    private $id;

    /**
     * @Vich\UploadableField(mapping="file", fileNameProperty="path", originalName="fileName")
     * @var HttpFile
     */
    private $file;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $path;

    /**
     * @var \DateTime
     */
    private $lastUpdate;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get file.
     *
     * @return HttpFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file.
     *
     * @param HttpFile $file
     * @return File
     */
    public function setFile($file)
    {
        $this->file = $file;
        if ($file) {
            $this
                ->setLastUpdate(new \DateTime());
        }
        return $this;
    }

    /**
     * Get fileName.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileName.
     *
     * @param string $fileName
     * @return File
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path.
     *
     * @param string $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     * @return $this
     */
    public function setLastUpdate(\DateTime $lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    /**
     * Get lastUpdate.
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
}