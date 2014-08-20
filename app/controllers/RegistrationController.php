<?php

use Larabook\Forms\RegistrationForm;
use Laracasts\Commander\CommandBus;
use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends \BaseController {

	function __construct(CommandBus $commandBus, RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
        $this->commandBus = $commandBus;
        
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
        
        extract(Input::only('username', 'email', 'password'));
        
        $user = $this->commandBus->execute(
                new RegisterUserCommand($username, $email, $password)
        );
		
		Auth::login($user);

		return Redirect::home();
	}
}
