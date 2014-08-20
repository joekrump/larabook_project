<?php
namespace Larabook\Users;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRepository
 *
 * @author DJ
 */
class UserRepository {
    
    /**
     * Register a user
     * @param \Larabook\Users\User $user
     * @return type
     */
    public function save(User $user)
    {
        return $user->save();
    }
}

?>
