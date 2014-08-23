<?php

namespace Larabook\Statuses\Events;


class StatusWasPublished {
    public $body;

    function __constructor($body)
    {
        $this->body = $body;
    }
} 