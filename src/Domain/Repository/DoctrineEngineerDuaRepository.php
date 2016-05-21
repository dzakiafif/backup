<?php
/**
 * Created by PhpStorm.
 * User: NecKomp
 * Date: 5/20/2016
 * Time: 2:13 PM
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\EngineerDuaRepositoryInterface;
use Yanna\bts\Domain\Entity\EngineerDua;
class DoctrineEngineerDuaRepository extends EntityRepository implements EngineerDuaRepositoryInterface {

    /**
     * @param $id
     * @return EngineerDua
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.

        return $this->find($id);
    }

    /**
     * @param $username
     * @return EngineerDua
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
     * @return EngineerDua
     */
    public function findByFormId($formId)
    {
        return $this->findOneBy(['formId' => $formId]);
    }
}