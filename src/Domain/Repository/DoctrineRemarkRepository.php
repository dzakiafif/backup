<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 13:59
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\RemarkRepositoryInterface;
use Yanna\bts\Domain\Entity\Remark;

class DoctrineRemarkRepository extends EntityRepository implements RemarkRepositoryInterface {


    /**
     * @param $id
     * @return Remark
     */
    public function findById($id)
    {
       return $this->find($id);
    }

    /**
     * @param $komentar
     * @return Remark
     */
    public function findByKomentar($komentar)
    {
        return $this->findOneBy(['komentar'=>$komentar]);
    }
}