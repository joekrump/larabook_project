<?php

class RegistrationController extends \BaseController {

	
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
		// create a new user.
		// 
		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);
		
		return Redirect::home();
	}
}
