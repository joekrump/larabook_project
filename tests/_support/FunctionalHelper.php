<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as DummyFactory;
use Hash;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function have($model, $overrides = [])
    {
        return DummyFactory::create($model, $overrides);
    }

    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }

    /**
     * Sign in process.
     */
    public function signIn()
    {
        $password = 'testing';

        $dummy_user = $this->haveAnAccount(['password'=>$password]);

        $I = $this->getModule('Laravel4');
        $I->amOnPage('/login');
        $I->fillField('email', $dummy_user->email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');
        $I->fillField('Status:', $body);
        $I->click('Post Status');
//        $this->have('Larabook\Statuses\Status', $overrides);
    }
}