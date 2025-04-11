<?php

namespace Source\Models;

use Source\Core\Model;

class Usuario extends Model
{

    public function __construct()
    {
        parent::__construct(
            "usuario", ["id_usuario"], ["id_unidade", "usuario", "senha"]
        );   
    }

    public function findIdUsuario($idUsuario) : Usuario
    {
        $this->find("id_usuario = :id","id={$idUsuario}");
        return ($this->fetch());    
    }

    public function autenticar(string $usuario, string $senha) : bool
    {   
        $user = $this->find("usuario = :u", "u={$usuario}")->fetch();
        
        if ($user){
            if($user->senha === $senha){
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
