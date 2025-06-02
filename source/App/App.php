<?php

namespace Source\App;

// use Source\Support\GerarPdf;
use Source\Models\NumeroIntervalo;
use Source\Models\NumeroOficio;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Autenticar;
use Source\Models\Unidade;
use Source\Models\Usuario;
use Source\Support\Message;
use Source\Support\Pager;

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

            if(empty($data["max-number"])) {
                $json["message"] = (new Message())->warning("O campo Número final é obrigatório!")->render();
                echo json_encode($json);
                return;
            }

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

        $query = $intervaloHistorico->select(
            ['numero_intervalo.*', 
            'usuario.usuario AS nome_usuario',
            'unidade.unidade AS nome_unidade'
            ])
            ->join('usuario', 'numero_intervalo.id_usuario = usuario.id_usuario')
            ->join('unidade', 'usuario.id_unidade = unidade.id_unidade')
            ->orderBy('id_numero_intervalo', 'DESC')
            ->get();

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
            "historicoGeral" => $query,
            "totGeral" => count((new NumeroIntervalo())->find()->fetch(true)),
        ]);
    }

    public function searchInteval(array $data) : void
    {

        var_dump($data);

        $usuario = Autenticar::usuarioLogado();
        $intervaloHistorico = (new NumeroIntervalo());
        $intervaloHistorico->getHistorico($usuario->id_usuario);
        $query = $intervaloHistorico->select(
        ['numero_intervalo.*', 
        'usuario.usuario AS nome_usuario',
        'unidade.unidade AS nome_unidade'
        ])
        ->join('usuario', 'numero_intervalo.id_usuario = usuario.id_usuario')
        ->join('unidade', 'usuario.id_unidade = unidade.id_unidade')
        ->orderBy('id_numero_intervalo', 'DESC')
        ->where("unidade","=","SEMDES GABINETE")
        ->get();

        // var_dump($query);

        $html = $this->view->renderizar("listHistoryGeral", [
            "historicoGeral" => $query
        ]);

        $json["html"] = $html;
        echo json_encode($json);
        return;
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

                $intervaloHistorico = (new NumeroIntervalo());

                $query = $intervaloHistorico->select(
                    ['numero_intervalo.*', 
                    'usuario.usuario AS nome_usuario',
                    'unidade.unidade AS nome_unidade'
                    ])
                    ->join('usuario', 'numero_intervalo.id_usuario = usuario.id_usuario')
                    ->join('unidade', 'usuario.id_unidade = unidade.id_unidade')
                    ->orderBy('id_numero_intervalo', 'DESC')
                    ->get();

                echo $this->view->renderizar("historicoGeral", [
                    "historicoGeral" => $query,
                    "totGeral" => count((new NumeroIntervalo())->find()->fetch(true)),
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

    /**
     * User
     */

    public function user(?array $data) : void
    {   
        // Navegar entre as páginas
        if(isset($data["page"]) && !empty($data["page"])) {

            $usuario = (new Usuario())->find();
            $page = (!empty($data["page"]) && filter_var($data["page"], FILTER_VALIDATE_INT) >= 1 ? $data["page"] : 1);
            $pager = new Pager(url("/user/p/"));
            $pager->pager($usuario->count(), 8, $page);

            $html = $this->view->renderizar("listUsers", [
                "countUser" => $usuario->count(),
                "usuarios" => $usuario
                    ->limit($pager->limit())
                    ->offset($pager->offset())
                    ->order("nome")
                    ->fetch(true),
                "paginator" => $pager->render()
            ]);  

            $json["html"] = $html;
            echo json_encode($json);
            return;
        }

        // Pesquisar dados pelo input ou selects
        
        if(isset($data["input-search-name"]) || isset($data["select-search-status"]) || isset($data["select-search-type-access"])){

            $search = isset($data["input-search-name"]) && $data["input-search-name"] ? trim(filter_var($data["input-search-name"], FILTER_SANITIZE_SPECIAL_CHARS)) : null;
            $value = trim((string) isset($data["select-search-status"]));
            $status = isset($data["select-search-status"]) && $value !== "" ? trim(filter_var($data["select-search-status"], FILTER_SANITIZE_SPECIAL_CHARS)) : null;
            $typeAcess = isset($data["select-search-type-access"]) && $data["select-search-type-access"] ? trim(filter_var($data["select-search-type-access"], FILTER_SANITIZE_SPECIAL_CHARS)) : null;
            
            $search = $search === "*" ? null : $search;
            $status = $status === "*" ? null : $status;
            $typeAcess = $typeAcess === "*" ? null : $typeAcess;

            // var_dump($search, $status, $typeAcess);

            $conditions = [];
            $params = [];

            if(!empty($search)) {
                $conditions[] = "usuario LIKE :u";
                $params["u"] = "%{$search}%";
            }

            if(!is_null($status)) {
                $conditions[] = "ativo = :a";
                $params["a"] = $status;
            }

            if(!is_null($typeAcess)) {
                $conditions[] = "tipo_acesso = :t";
                $params["t"] = $typeAcess;
            }

            $where = implode(" AND ", $conditions);

            $usuario = (new Usuario())->find($where, http_build_query($params));

            $pager = new Pager(url("/user/p/"));
            $pager->pager($usuario->count(), 8, 1);

            $html = $this->view->renderizar("listUsers", [
                "usuarios" => $usuario
                    ->limit($pager->limit())
                    ->offset($pager->offset())
                    ->order("usuario")
                    ->fetch(true),
                "paginator" => $pager->render()
            ]);

            $json["html"] = $html;
            echo json_encode($json);
            return;
        }



        $usuario = (new Usuario())->find();
        $pager = new Pager(url("/user/p/"));
        $pager->pager($usuario->count(), 8, 1);

        echo $this->view->renderizar("usuario", [
            "countUser" => $usuario->count(),
            "usuarios" => $usuario
                ->limit($pager->limit())
                ->offset($pager->offset())
                ->order("nome")
                ->fetch(true),
            "paginator" => $pager->render()
        ]);  
    }

    public function modalUser(?array $data) : void
    {


        if(isset($data["idUser"])) {
            $id = filter_var($data["idUser"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $idUser = (new Usuario())->findIdUsuario($id);
        }

        if(!empty($data['csrf'])) {
            
            if(!csrf_verify($data)) {
                $json["message"] = (new Message())->warning("Erro ao enivar, use o formulário!")->render();
                echo json_encode($json);
                return;
            }
        
            $cleanArray = cleanInputData($data);

            if(!$cleanArray['valid']) {
                $json["message"] = (new Message())->error("Preencha os campos obrigatórios!")->render();
                echo json_encode($json);
                return;
            }

            $dataClean = $cleanArray['data'];

            $usuario = (new Usuario());

            $usuario->id_unidade = $dataClean['unit'];
            $usuario->nome = $dataClean['name'];
            $usuario->usuario = $dataClean['usuario'];
            $usuario->senha = passwd($dataClean['password']);
            $usuario->tipo_acesso = $dataClean['typeAccess'];
            $usuario->ativo = $dataClean['status'];

            if(isset($idUser)) {
                $usuario->id_usuario = $idUser->id_usuario;
            }

            if($usuario->save()) {
                $json["message"] = $this->message->success("Registro salvo com sucesso!")->render();
                $json["redirected"] = url("/user");
                echo json_encode($json);
                return;
            }
        }

        $unidades = (new Unidade())->find()->order("unidade")->fetch(true);

        echo $this->view->renderizar("modalForm", [
            "usuario" => $idUser ?? null,
            "unidades" => $unidades
        ]);  
    }

    public function updateList() : void
    {          
        $usuario = (new Usuario())->find()->limit(12)->fetch(true);
        echo $this->view->renderizar("list_usuario", [
            "usuarios" => $usuario
        ]);  
    }
}