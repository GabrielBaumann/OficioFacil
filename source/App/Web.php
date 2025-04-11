<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\NumeroIntervalo;
use Source\Models\NumeroOficio;
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
                echo json_encode($json);
                return;
           }
           
           if(empty($data['usuario']) || empty($data['senha'])) {
                $json['message'] = $this->message->warning("Informe o usuario e senha para entrar.")->render();
                echo json_encode($json);
                return;
           }

           $usuario = (new Usuario());
           if(!$usuario->autenticar($data['usuario'], $data['senha'])) {
                $json['message'] = $usuario->message()->render();
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

    public function oficio(?array $data) : void
    {
        
        if(!empty($data['csrf'])){

            $intervalo = (new NumeroIntervalo());
            $verificar = $intervalo->verificarNumero($data['min-number'], $data['max-number']);

            if ($verificar) {
                var_dump($verificar);
                return;
            }

            // $json['message'] = $intervalo->message()->render();
            // echo json_encode($json);
            // return;

            $intervalo->cadastrarIntervalo(
                1,
                $data['min-number'],
                $data['max-number'],
                $data['observacao']
            );

            $intervalo->save();

            // $numeroOficio = (new NumeroOficio());
            // $numeroOficio->gerarNumero($data['min-number'], $data['max-number'], 1, $intervalo->getIdRetorno());

            // $numeroOficio->save();

            // $json['message'] = $numeroOficio->message()->render();
            // echo json_encode($json);
            // return;
            }

        echo $this->view->renderizar("formulario_oficio", [
            "title" => "OfícioFácil"
        ]);
    }

}
