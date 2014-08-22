<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Log into my larabook account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome Back!');
$I->assertTrue(Auth::check());
