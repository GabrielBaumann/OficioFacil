<?php

namespace Source\App;

// use Source\Support\GerarPdf;
use Source\Models\NumeroIntervalo;
use Source\Models\NumeroOficio;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Autenticar;
use Source\Models\Unidade;

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

            $ultimoIntervalo = $intervalo->find()->order("id_numero_intervalo DESC")->fetch();
            $numeroIntervalor = ($ultimoIntervalo->fim ?? 0) + 1;

            $verificarNumero = $intervalo->verificarNumero($numeroIntervalor, $data['max-number'], $usuario->id_unidade);

            if(!$verificarNumero){
                $json['message'] = $intervalo->message()->render();
                $json['erro'] = "error";
                echo json_encode($json);
                return;
            }

            $intervalo->cadastrarIntervalo(
                $usuario->id_usuario,
                $numeroIntervalor,
                $data['max-number'],
                $data['observacao']
            );

            $intervalo->save();


            $numeroOficio = (new NumeroOficio());
            $numeroOficio->gerarNumero($numeroIntervalor, $data['max-number'],  $usuario->id_usuario, $intervalo->getIdRetorno());

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
            "unidade" => $unidade->fetch(),
            "historicoGeral" => (new NumeroIntervalo())->find()->order("id_numero_intervalo DESC")->fetch(true),
            "totGeral" => count((new NumeroIntervalo())->find()->fetch(true))
        ]);
    }

    public function fechar() : void
    {   
        $session = new Session();
        $session->unset("usuario");
        $session->destroy();

        echo $this->view->renderizar("login",[
            "title" => "OfícioFácil"
        ]);
    }

    public function atualizar(array $data) : void
    {   
        $local = $data["local"] ?? null;
        $user = Autenticar::usuarioLogado();

        if ($local === "intervaloMais") {
            $intervalo = (new NumeroIntervalo());
            $ultimoIntervalo = $intervalo->find()->order("id_numero_intervalo DESC")->fetch();

            echo $this->view->renderizar("intervalo_mais", [
                "intervalo" => $ultimoIntervalo
            ]);
        }


        if ($local === "historicoUnidade") {
            $usuario = Autenticar::usuarioLogado();
            $intervaloHistorico = (new NumeroIntervalo());
            $intervaloHistorico->getHistorico($usuario->id_usuario);


            echo $this->view->renderizar("historicoUnidade", [
                "historico" => $intervaloHistorico->fetch(true),
                "totHistorico" => $intervaloHistorico->count($usuario->id_usuario)
            ]);

            if($user->tipo_acesso === "adm" || $user->tipo_acesso === "dev") {

                $intervaloHistorico = (new NumeroIntervalo())->find()->order("id_numero_intervalo DESC")->fetch(true);


                $re = (new NumeroIntervalo())->find("id_numero_intervalo = :id", "id=*");
                    var_dump($re->fetch(true));

                echo $this->view->renderizar("historicoGeral", [
                    "historicoGeral" => $intervaloHistorico,
                    "totGeral" => count($intervaloHistorico),
                    "unidade" => (new Unidade())->find()->fetch(true)
                ]);
            }
        }
    }

    public function gerarpdf(array $data) : void
    {   

        $id = $data['id'];
        $intervalo = (new NumeroOficio())->find("id_numero_intervalo = :id", "id={$id}");
        $numero = $intervalo->fetch(true);

        echo $this->view->renderizar("lista-impressao", [
            "title" => "Impressão",
            "numeros" => $numero
        ]);
    }
}