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
		
		return Redirect::home();
	}
}
