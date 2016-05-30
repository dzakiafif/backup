<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 26/04/2016
 * Time: 6:27
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Documentation;

interface DocumentationRepositoryInterface {

    /**
     * @param $id
     * @return Documentation
     */
    public function findById($id);

    /**
     * @param $username
     * @return Documentation
     */
    public function findByUsername($username);

    /**
     * @param $siteName
     * @return Documentation
     */
    public function findBySiteName($siteName);

    /**
     * @param $formId
     * @return Documentation
     */
    public function findByFormId($formId);
}