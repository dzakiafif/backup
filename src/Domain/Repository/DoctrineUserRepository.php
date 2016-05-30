<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/04/16
 * Time: 3:11
 */

namespace Yanna\bts\Domain\Repository;

use Yanna\bts\Domain\Contracts\Repository\UserRepositoryInterface;
use Yanna\bts\Domain\Entity\User;
use Doctrine\ORM\EntityRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @param $id
     * @return User
     */
    public function findById($id)
    {
        return $this->find($id);
    }

    /**
     * @param $username
     * @return User
     */
    public function findByUsername($username)
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * @param $role
     * @return User
     */
    public function findByRole($role)
    {
        return $this->findBy(['role' => $role]);
    }
}