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

    public function findIdUsuario(int $idUsuario, string $columns = "*") : Usuario
    {   
       $find = $this->find("id_usuario = :id","id={$idUsuario}", $columns);
        return $find->fetch();    
    }



    public function save() : bool
    {
        $this->create($this->safe());
        return true;    
    }

}
