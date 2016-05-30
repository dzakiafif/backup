<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 26/04/2016
 * Time: 6:33
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\DocumentationRepositoryInterface;
use Yanna\bts\Domain\Entity\Documentation;
class DoctrineDocumentationRepository extends EntityRepository implements DocumentationRepositoryInterface {


    /**
     * @param $id
     * @return Documentation
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->find($id);
    }

    /**
     * @param $username
     * @return Documentation
     */
    public function findByUsername($username)
    {
        // TODO: Implement findByUsername() method.
        return $this->findBy(['username'=>$username]);
    }

    /**
     * @param $siteName
     * @return Documentation
     */
    public function findBySiteName($siteName)
    {
        // TODO: Implement findBySiteName() method.
        return $this->findBy(['siteName' => $siteName]);
    }

    /**
     * @param $formId
     * @return Documentation
     */
    public function findByFormId($formId)
    {
        return $this->findOneBy(['formId' => $formId]);
    }
}