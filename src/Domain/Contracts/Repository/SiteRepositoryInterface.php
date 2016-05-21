<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/04/16
 * Time: 5:32
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Site;


interface SiteRepositoryInterface
{
    /**
     * @param $id
     * @return Site
     */
    public function findById($id);

    /**
     * @param $siteId
     * @return Site
     */
    public function findBySiteId($siteId);

    public function findByFormId($formId);
}