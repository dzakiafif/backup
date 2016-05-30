<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 13:58
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Remark;

interface RemarkRepositoryInterface {

    /**
     * @param $id
     * @return Remark
     */
    public function findById($id);

    /**
     * @param $komentar
     * @return Remark
     */
    public function findByKomentar($komentar);
}