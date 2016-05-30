<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 19/05/2016
 * Time: 11:38
 */

namespace Yanna\bts\Domain\Services;

use Yanna\bts\Domain\Entity\Engineer;

class EngineerServices {

    public static function changeStatus(Engineer $engineer)
    {
        $status = $engineer->getValidateState();

        switch($status)
        {
            case 0:
                $engineer->setValidateState(1);
                break;
            case 1:
                $engineer->setValidateState(0);
                break;
        }
    }
}