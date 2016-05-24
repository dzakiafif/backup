<?php
/**
 * Created by PhpStorm.
 * User: NecKomp
 * Date: 5/24/2016
 * Time: 7:24 PM
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\DocumentRepositoryInterface;
use Yanna\bts\Domain\Entity\Document;
class DoctrineDokumenRepository extends EntityRepository implements DocumentRepositoryInterface {

    /**
     * @param $id
     * @return Document
     */
    public function findById($id)
    {
        return $this->find($id);
    }

    /**
     * @param $formId
     * @return Document
     */
    public function findByFormId($formId)
    {
        return $this->findBy(['formId'=>$formId]);
    }
}