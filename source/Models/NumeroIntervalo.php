<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Models\NumeroOficio;

class NumeroIntervalo extends Model
{
    private $indRetorno;

    public function __construct()
    {
        parent::__construct(
            "numero_oficio_intervalo",["id_usuario"],["inicio","fim"]
        );    
    }

    public function cadastrarIntervalo(
        int $idUsuario,
        int $numeroInicial,
        int $numeroFinal,
        string $observacao = null
    ) : NumeroIntervalo {
            $this->id_usuario = $idUsuario;
            $this->inicio = $numeroInicial;
            $this->fim = $numeroFinal;
            $this->observacao = $observacao;
            return $this;
    }

    public function save() : bool
    {   
        $this->indRetorno = $this->create($this->safe());
        return true;    
    }

    public function getIdRetorno() : ?int
    {  
       return $this->indRetorno;  
    }

    public function verificarNumero(int $numeroInicio, int $numeroFim) : bool
    {

        if ($numeroInicio != (int)$numeroInicio || $numeroFim != (int)$numeroFim){
            $this->message("Número não compatíveis!")->render();
            return false;
        }

        if ($numeroFim < 0 || $numeroFim < 0) {
            $this->message->warning("Os número não podem ser negativos!")->render();
            return false;
        }

        if ($numeroInicio > $numeroFim) {
            $this->message->warning("O número inicial não pode ser maior que o número final!")->render();
            return false;
        }
        if ($this->verificarNumeroBanco($numeroInicio, $numeroFim)){
            return false;
        } else {
             return true;
        } 
    }

    public function verificarNumeroBanco(int $numeroInicio, int $numeroFim) : bool
    {   
        $anoAtual = date('Y');
        $numeroOficio = (new NumeroOficio());

        for ($i = $numeroInicio; $i <= $numeroFim; $i++) {
            $numeroOficio->find("numero_oficio = :numero AND ano_oficio = :anoof","numero={$i}&anoof={$anoAtual}");
            $dados = $numeroOficio->fetch();
            if($dados){
                $this->message->warning("Esse intervalo, ou parte dos números desse intervalo já foram cadastrados!")->render();
                return true;
            }else {
                return false;
            }
        }
        return false; 
    }

}
