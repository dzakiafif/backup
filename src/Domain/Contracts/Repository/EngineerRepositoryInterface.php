<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/04/16
 * Time: 4:29
 */

namespace Yanna\bts\Domain\Contracts\Repository;


use Yanna\bts\Domain\Entity\Engineer;

interface EngineerRepositoryInterface
{
    /**
     * @param $id
     * @return Engineer
     */
    public function findById($id);

    /**
     * @param $username
     * @return Engineer
     */
    public function findByUsername($username);

    /**
     * @param $siteName
     * @return Engineer
     */
    public function findBySiteName($siteName);

    /**
     * @param $formId
     * @return Engineer
     */
    public function findByFormId($formId);
}