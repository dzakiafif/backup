<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 23/05/2016
 * Time: 19:15
 */

namespace Yanna\bts\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\DokumenRepositroyInterface;
use Yanna\bts\Domain\Entity\Dokumen;

class DoctrineDokumenRepository extends EntityRepository implements DokumenRepositroyInterface {


    /**
     * @param $id
     * @return Dokumen
     */
    public function findById($id)
    {
       return $this->find($id);
    }

    /**
     * @param $fileName
     * @return Dokumen
     */
    public function findByUsername($username)
    {
       return $this->findOneBy(['username'=>$username]);
    }
}