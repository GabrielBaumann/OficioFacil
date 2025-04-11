<?php

namespace Source\Models;

use Source\Core\Model;

class NumeroOficio extends Model
{
    public function __construct()
    {
        parent::__construct(
            "numero_oficio",["id_numero_oficio"], ["id_usuario", "numero_oficio", "ano_oficio"]
        );
    }

    public function cadastrarNumero(
        int $idUsuario, 
        int $numeroOficio, 
        int $anoOficio,
        int $idNumeroIntervalo
        
    ) : NumeroOficio {
        $this->id_usuario = $idUsuario;
        $this->numero_oficio = $numeroOficio;
        $this->ano_oficio = $anoOficio;
        $this->id_numero_intervalo = $idNumeroIntervalo;

        return $this;
    }

    public function gerarNumero(int $numeroInicio, int $numeroFim, int $idUsuario, int $numeroIntervalo) : bool
    {  
        $loop = 0;

        for ($i = $numeroInicio; $i <= $numeroFim; $i++) {
            $this->cadastrarNumero($idUsuario, $i, date('Y'), $numeroIntervalo);
            $this->save();
            $loop ++;
        }

        $numeroFormat = sprintf('%04d', $loop);

        $this->message->success("{$numeroFormat} Números cadastrados com sucesso!")->render();
        return true;
    }

    public function save() : bool
    {
        $this->create($this->safe());
        return true;    
    }

}
