<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/04/16
 * Time: 4:31
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\EngineerRepositoryInterface;
use Yanna\bts\Domain\Entity\Engineer;

class DoctrineEngineerRepository extends EntityRepository implements EngineerRepositoryInterface
{
    /**
     * @param $id
     * @return Engineer
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.

        return $this->find($id);
    }

    /**
     * @param $username
     * @return Engineer
     */
    public function findByUsername($username)
    {
        // TODO: Implement findByUsername() method.

        return $this->findBy(['username' => $username]);
    }

    /**
     * @param $siteName
     * @return Engineer
     */
    public function findBySiteName($siteName)
    {
        // TODO: Implement findBySiteName() method.

        return $this->findBy(['siteName' => $siteName]);
    }

    /**
     * @param $formId
     * @return Engineer
     */
    public function findByFormId($formId)
    {
        return $this->findOneBy(['formId' => $formId]);
    }
}