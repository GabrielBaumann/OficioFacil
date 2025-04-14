<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Autenticar;
use Source\Models\Usuario;
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
        if (!empty($data['csrf'])) {
           if(!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário!")->render();
                $json['erro'] = "error";
                echo json_encode($json);
                return;
           }
           
           if(empty($data['usuario']) || empty($data['senha'])) {
                $json['message'] = $this->message->warning("Informe o usuario e senha para entrar.")->render();
                $json['erro'] = "error";
                echo json_encode($json);
                return;
           }

           $usuario = (new Autenticar());

           if(!$usuario->logar($data['usuario'], $data['senha'])) {
                $json['message'] = $usuario->message()->render();
                $json['erro'] = "error";
                echo json_encode($json);
                return;
            } else {
                $json['redirect'] = url("/of");
                echo json_encode($json);
                return;
            };
            return;
        }

        echo $this->view->renderizar("login", [
            "title" => "Login Office"
        ]);

    }

}
