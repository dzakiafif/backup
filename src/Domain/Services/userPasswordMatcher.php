<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/04/16
 * Time: 4:30
 */

namespace Yanna\bts\Domain\Services;

use Yanna\bts\Domain\Entity\User;
class userPasswordMatcher
{
    private $rawPassword;

    private $user;

    public function __construct($rawPassword, User $user)
    {
        $this->rawPassword = $rawPassword;
        $this->user = $user;
    }

    public function match()
    {
        return password_verify($this->rawPassword, $this->user->getPassword());
    }
}