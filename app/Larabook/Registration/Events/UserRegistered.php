<?php
/**
 * Created by PhpStorm.
 * User: DJ
 * Date: 8/22/14
 * Time: 10:42 AM
 */

namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserRegistered {
    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }


}