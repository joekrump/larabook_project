<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// fields that may be mass assigned
	// 
	protected $fillable = ['username', 'email', 'password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
    
    /**
     * Register a new User
     * @param type $username
     * @param type $email
     * @param type $password
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));
        
        // Raise an event
        return $user;
    }
}
