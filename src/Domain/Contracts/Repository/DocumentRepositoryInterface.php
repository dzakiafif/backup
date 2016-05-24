<?php
/**
 * Created by PhpStorm.
 * User: NecKomp
 * Date: 5/24/2016
 * Time: 7:22 PM
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Document;

interface DocumentRepositoryInterface {

    /**
     * @param $id
     * @return Document
     */
    public function findById($id);

    /**
     * @param $formId
     * @return Document
     */
    public function findByFormId($formId);
}