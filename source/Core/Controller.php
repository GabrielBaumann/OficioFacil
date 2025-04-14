<?php

namespace Source\Core;

use Source\Support\Message;

class Controller
{
    protected $view;
    protected $message;

    public function __construct(?string $localViews = null)
    {
        $this->view = new View($localViews);
        $this->message = new Message();
    }

}
