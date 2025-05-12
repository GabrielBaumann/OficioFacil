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
        if (!empty($this->id_usuario)) {
            $id = $this->id_usuario;

            $this->update($this->safe(), "id_usuario = :id", "id={$id}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }        

        if (empty($this->id_usuario)) {
            $id = $this->create($this->safe());

            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }
        $this->data = $this->findIdUsuario($id)->data();
        return true;    
    }

}
