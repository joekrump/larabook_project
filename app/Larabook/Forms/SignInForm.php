<?php
namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    /**
     * Validation rules for the registration form
     * @var [type]
     */
    protected $rules = [
        'email'    => 'required',
        'password' => 'required'
    ];
}