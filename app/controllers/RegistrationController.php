<?php

use Larabook\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}
	/**
	 * Show the form to register a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	public function store()
	{
		$this->registrationForm->validate(Input::all());
		
		// create a new user.
		// 
		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);

		return Redirect::home();
	}
}
