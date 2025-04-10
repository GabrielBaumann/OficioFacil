<?php

namespace Source\Core;

class Controller
{
    protected $view;

    public function __construct(?string $localViews = null)
    {
        $this->view = new View($localViews);
    }

}
