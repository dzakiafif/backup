<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 06/05/2016
 * Time: 12:40
 */

namespace Yanna\bts\Domain\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Dokumen
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDokumenRepository")
 * @package Yanna\bts\Domain\Entity
 * @Table(name="dokumen")
 * @HasLifecycleCallbacks
 */
class Dokumen
{

    /**
     * @Id
     * @Column(type="integer",nullable=false)
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="text",nullable=false)
     * @var string
     */
    private $description;

    /**
     * @Column(type="text",nullable=false)
     * @var string
     */
    private $filename;

    /**
     * @Column(type="datetime",name="created_at",nullable=false)
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Column(type="datetime",name="updated_at",nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var UploadedFile
     */
    private $file;

    public static function create($description,UploadedFile $file)
    {
        $fileName = uniqid(). '.' . $file->guessExtension();

        $dokumen = new Dokumen();

        $dokumen->setCreatedAt(new \DateTime());
        $dokumen->setDescription($description);
        $dokumen->setFile($file);
        $dokumen->setFilename($fileName);

        return $dokumen;

    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function timestampableCreateEvent()
    {
        $this->createdAt = new \DateTime();
    }

    public function timestampableUpdateEvent()
    {
        $this->updatedAt = new \DateTime();
    }

}