<?php

namespace Source\Models;

use Source\Core\Model;

class Unidade extends Model
{
    public function __construct()
    {
        parent::__construct(
            "unidade",["id_unidade"],["unidade"]
        );
    }

    public function idUnidade(int $idUnidade) : ?Unidade
    {
        $this->find("id_unidade = :id","id={$idUnidade}");
        return ($this->fetch());    
    }

}
