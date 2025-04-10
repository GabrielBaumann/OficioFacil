<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Support\Message;

class Web extends Controller
{   
    public $message;

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");
    
        $this->message = (new Message());
    }

    public function login(?array $data) : void
    {
        
        if (!empty($data['usuario'])) {
            $Json['message'] = $this->message->warning("Atenção")->render();
            echo json_encode($Json);
            return;
        }

        echo $this->view->renderizar("login", [
            "title" => "Login Office"
        ]);
    }

}
