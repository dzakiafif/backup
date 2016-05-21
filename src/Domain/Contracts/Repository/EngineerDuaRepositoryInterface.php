<?php
/**
 * Created by PhpStorm.
 * User: NecKomp
 * Date: 5/20/2016
 * Time: 2:10 PM
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\EngineerDua;

interface EngineerDuaRepositoryInterface {

    /**
     * @param $id
     * @return EngineerDua
     */
    public function findById($id);

    /**
     * @param $username
     * @return EngineerDua
     */
    public function findByUsername($username);

    /**
     * @param $siteName
     * @return EngineerDua
     */
    public function findBySiteName($siteName);

    /**
     * @param $formId
     * @return EngineerDua
     */
    public function findByFormId($formId);

}