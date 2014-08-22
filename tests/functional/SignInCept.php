<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Log into my larabook account');

$I->haveAnAccount();

$I->amOnPage('/login');
$I->fillField('email', '');
$i->fillField('password', '');
$I->click('Sign In');

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
