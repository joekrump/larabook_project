<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Core\CommandBus;
use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends \BaseController {

    use CommandBus;
    /**
     *
     * @var type 
     */
    private $registrationForm;
    
	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;

        $this->beforeFilter('guest'); // filter all requests through the 'guest'  filter.
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
        
        $user = $this->execute(
                new RegisterUserCommand($username, $email, $password)
        );
		
		Auth::login($user);

        Flash::overlay('Glad to have you as a new Larabook member!');
		return Redirect::home()->with('flash_message', '');
	}
}
