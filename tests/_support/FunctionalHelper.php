<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as DummyFactory;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function haveAnAccount()
    {
        $user = DummyFactory::create('Larabook\Users\User');
    }
}