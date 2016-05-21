<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08/04/16
 * Time: 5:32
 */

namespace Yanna\bts\Domain\Repository;

use Yanna\bts\Domain\Contracts\Repository\SiteRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Entity\Site;
class DoctrineSiteRepository extends EntityRepository implements SiteRepositoryInterface
{

    /**
     * @param $id
     * @return Site
     */
    public function findById($id)
    {
       return $this->find($id);
    }

    /**
     * @param $siteId
     * @return Site
     */
    public function findBySiteId($siteId)
    {
        return $this->findOneBy(['site_id'=>$siteId]);
    }

    public function findByFormId($formId)
    {
//        return $this->findOneBy(['form_id' => $formId]);
    }
}