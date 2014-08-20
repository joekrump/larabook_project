<?php
namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class ReigstrationForm extends FormValidator
{
	/**
	 * Validation rules for the registration form
	 * @var [type]
	 */
	protected $rules = [
		'username'=> 'required|unique:users',
		'email' =>'required|email|unique:users',
		'password' =>'required|confirmed'
	];
}