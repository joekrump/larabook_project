<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;
        $this->beforeFilter('guest', ['except'=>'destroy']);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for signing in
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Get the input from the log in form and try to log in a user.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::only('email', 'password');
        $result = $this->signInForm->validate($input);
        if(Auth::attempt($input))
        {
            Flash::success('Welcome Back!');

            return Redirect::intended('/statuses');
        }
        return Redirect::back()->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    /**
     * Logout the logged in User and end their session.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
	{
		Auth::logout();

        Flash::message('You have now been logged out.');

        return Redirect::home();
	}


}
