<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 13:50
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class Remark
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineRemarkRepository")
 * @package Yanna\bts\Domain\Entity
 * @Table(name="remark")
 * @HasLifecycleCallbacks
 */
class Remark {

    /**
     * @Id
     * @Column(type="integer",nullable=false)
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    private $komentar;

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

    public static function create($komentar)
    {
        $remark = new Remark();

        $remark->setKomentar($komentar);
        $remark->setCreatedAt(new \DateTime());
        $remark->setUpdatedAt(new \DateTime());

        return $remark;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getKomentar()
    {
        return $this->komentar;
    }

    public function setKomentar($komentar)
    {
        $this->komentar = $komentar;
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