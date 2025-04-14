<?php

namespace Source\App;
use Source\Models\NumeroIntervalo;
use Source\Models\NumeroOficio;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Autenticar;
use Source\Models\Unidade;
use Source\Support\GerarPdf;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../views/");

        if (!Autenticar::usuarioLogado()) {
            $this->message->warning("Efetue login para acessar!")->flash();
            redirect("/");
        }
    }

    public function oficio(?array $data) : void
    {   

        $usuario = Autenticar::usuarioLogado();
        $intervalo = (new NumeroIntervalo());
        if(!empty($data['csrf'])){
            
            $verificarNumero = $intervalo->verificarNumero($data['min-number'], $data['max-number'], $usuario->id_unidade);

            if(!$verificarNumero){
                $json['message'] = $intervalo->message()->render();
                $json['erro'] = "error";
                echo json_encode($json);
                return;
            }

            $intervalo->cadastrarIntervalo(
                $usuario->id_usuario,
                $data['min-number'],
                $data['max-number'],
                $data['observacao']
            );

            $intervalo->save();


            $numeroOficio = (new NumeroOficio());
            $numeroOficio->gerarNumero($data['min-number'], $data['max-number'],  $usuario->id_usuario, $intervalo->getIdRetorno());

            $json['id'] = $intervalo->getIdRetorno();
            $json['message'] = $numeroOficio->message()->render();
            echo json_encode($json);
            return;

        }
        
        $intervaloHistorico = (new NumeroIntervalo());

        $ultimoIntervalo = $intervalo->find()->order("id_numero_intervalo DESC")->fetch();
        $intervaloHistorico->getHistorico($usuario->id_usuario);
        $unidade = (new Unidade());

        $unidade->idUnidade($usuario->id_unidade);

        echo $this->view->renderizar("formulario_oficio", [
            "title" => "OfícioFácil",
            "intervalo" => $ultimoIntervalo,
            "historico" => $intervaloHistorico->fetch(true),
            "totHistorico" => $intervaloHistorico->count($usuario->id_usuario),
            "usuario" => $usuario,
            "unidade" => $unidade->fetch()
        ]);
    }

    public function fechar() : void
    {   
        $session = new Session();
        $session->unset("usuario");
        
        echo $this->view->renderizar("sair",[
            "title" => "Exit"
        ]);
    }

    public function atualizar(array $data) : void
    {   
        $local = $data["local"] ?? null;
        
        if ($local === "intervalo") {
            $intervalo = (new NumeroIntervalo());
            $ultimoIntervalo = $intervalo->find()->order("id_numero_intervalo DESC")->fetch();
            
            echo $this->view->renderizar("intervalo", [
                "intervalo" => $ultimoIntervalo
            ]);
        }
            
        if ($local === "historico") {
            $usuario = Autenticar::usuarioLogado();
            $intervaloHistorico = (new NumeroIntervalo());
            $intervaloHistorico->getHistorico($usuario->id_usuario);

            echo $this->view->renderizar("historico", [
                "historico" => $intervaloHistorico->fetch(true),
                "totHistorico" => $intervaloHistorico->count($usuario->id_usuario)
            ]);
        }    
    }

    public function gerarpdf(array $data) : void
    {   

        $id = $data['id'];
        $intervalo = (new NumeroOficio())->find("id_numero_intervalo = :id", "id={$id}");
        $numero = $intervalo->fetch(true);

        $gerarpdf = (new GerarPdf());

        $html = $this->view->renderizar("lista-impressao", [
            "title" => "Impressão Ofício",
            "numeros" => $numero
        ]);
        
        $gerarpdf->gerarPDF($html, 'listaOficio.pdf');
    }
}
