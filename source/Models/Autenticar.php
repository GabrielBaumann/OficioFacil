<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;

class Autenticar extends Model
{
    public function __construct()
    {
        parent::__construct(
            "usuario",["id_usuario"],["usuario", "senha"]
        );        
    }

    public static function usuarioLogado() : ?Usuario
    {
        $session = new Session();
        if (!$session->has("usuario")) {
            return null;
        }
        return (new Usuario())->findIdUsuario($session->usuario);
    }

    public function logar(string $usuario, string $senha) : bool
    {   
        $user = $this->find("usuario = :u", "u={$usuario}")->fetch();
        
        if ($user){
            
            if($user->ativo === 0){
                $this->message->error("Usuário sem acesso ao sistema! Entre em contato com o administrado!")->render();
                return false;
            }
            
            if($user->senha === $senha){
                (new Session())->set("usuario", $user->id_usuario);
                $this->message->success("Login efetuado com sucesso. Seja bem vindo(a) {$user->usuario}")->flash();
                return true;
            }
            $this->message->warning("Senha inválida!")->render();
            return false;
        };
        $this->message->warning("O usuário não cadastrado!")->render();
        return false;    
    }
    
}
