<?php

namespace Larabook\Registration;

use Larabook\Users\UserRepository;
use Larabook\Users\User;
use Laracasts\Commander\CommandHandler;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterUserCommandHandler
 *
 * @author DJ
 */
class RegisterUserCommandHandler implements CommandHandler{
    
    protected $repository;
    
    function __construct(UserRepository $repo)
    {
        $this->repository = $repo;
    }
    
    public function handle($command)
    {
        // create a new user.
		// 
		$user = User::register($command->username, $command->email, $command->password);
        
        $this->repository->save($user);
        return $user;
    }
}

?>
