<?php
namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

    /**
     * Validation rules for the status form
     * @var [type]
     */
    protected $rules = [
        'body'    => 'required'
    ];
}