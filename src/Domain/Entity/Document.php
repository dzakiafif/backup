<?php
/**
 * Created by PhpStorm.
 * User: NecKomp
 * Date: 5/24/2016
 * Time: 7:00 PM
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class Document
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDocumentRepository")
 * @package Yanna\bts\Domain\Entity
 * @Table(name="document")
 * @HasLifecycleCallbacks
 */
class Document {

    /**
     * @Id
     * @Column(type="integer")
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="text",name="description",nullable=false)
     * @var string
     */
    private $description;

    /**
     * @Column(type="text",name="filename",nullable=false)
     * @var string
     */
    private $filename;

    /**
     * @Column(type="string",name="form_id",nullable=false)
     * @var string
     */
    private $formId;

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
    public $uploadedFile;

    public static function create($description,$uploadedFile,$formId)
    {
        $fileExt = pathinfo($uploadedFile, PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $fileExt;

        $dokumen = new Document();

        $dokumen->setDescription($description);
        $dokumen->setFileName($fileName);
        $dokumen->setFormId($formId);
        $dokumen->setCreatedAt(new \DateTime());
        $dokumen->setUpdatedAt(new \DateTime());



        return $dokumen;
    }

    /**
     * @return UploadedFile
     */
    public function getUploadFile()
    {
        return $this->uploadedFile;
    }

    /**
     * @param UploadedFile $uploadedFile
     */
    public function setUploadFile($uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @PrePersist
     * @return void
     */
    public function timestampableCreateEvent()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @PrePersist
     * @return void
     */
    public function timestampableUpdateEvent()
    {
        $this->updatedAt = new \DateTime();
    }

}