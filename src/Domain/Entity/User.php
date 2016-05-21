<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/04/16
 * Time: 2:51
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class User
 * @package Yanna\bts\Domain\Entity
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineUserRepository")
 * @HasLifecycleCallbacks
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $username;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    private $password;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */

    /**
     * @Column(type="integer", nullable=false)
     * @var int
     */
    private $role;

    /**
     * @Column(type="datetime", name="created_at")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Column(type="datetime", name="updated_at")
     * @var \DateTime
     */
    private $updateAt;


    /**
     * @param $name
     * @param $username
     * @param $password
     * @param $role
     * @return User
     */
    public static function create($name, $username, $password, $role)
    {
        $userInfo = new User();

        $userInfo->setName($name);
        $userInfo->setUsername($username);
        $userInfo->setPassword($password);
        $userInfo->setRole($role);
        $userInfo->setCreatedAt(new \DateTime());
        $userInfo->setUpdatedAt(new \DateTime());

        return $userInfo;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param $password
     */
    public function setPasswordNonHash($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
        return $this->updateAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updateAt = $updatedAt;
    }

      /**
     * @param Paket $paket
     */


    /**
     * @PrePersist
     * @Return void
     */
    public function timestampableCreateEvent()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @PrePersist
     * @Return void
     */
    public function timestampableUpdateEvent()
    {
        $this->updateAt = new \DateTime();
    }

}