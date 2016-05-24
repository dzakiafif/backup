<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 19:14
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Dokumen;

interface DokumenRepositroyInterface {

    /**
     * @param $id
     * @return Dokumen
     */
    public function findById($id);

    /**
     * @param $username
     * @return Dokumen
     */
    public function findByUsername($username);


}