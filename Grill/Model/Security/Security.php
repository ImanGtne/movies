<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 18/01/2017
 * Time: 10:10
 */

namespace Grill\Model\Security;

use Entity\User;


class Security
{
    public function connectUser(User $user)
    {
        $user->setPassword(null);
        $_SESSION['user'] = $user;
    }

    public function disconnectUser()
    {
        unset($_SESSION['user']);
    }
    public function getUser()
    {
        if(!empty($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
    }
}