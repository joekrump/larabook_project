<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserRegistered;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

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
     * Passwords must always be hashed.
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    
    /**
     * Register a new User
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered);
        // Raise an event
        return $user;
    }
}
