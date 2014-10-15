<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserRegistered;
use Eloquent, Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

    // fields that may be mass assigned
    //
    protected $fillable = ['username', 'email', 'password'];

    protected $remember_token;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Path to the User's presenter
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }
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
     * @return User $user
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered($user));

        // Raise an event
        return $user;
    }
}
