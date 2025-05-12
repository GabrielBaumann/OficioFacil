<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Models\NumeroOficio;
use Source\Models\Unidade;

class NumeroIntervalo extends Model
{
    private $idRetorno;

    public function __construct()
    {
        parent::__construct(
            "numero_intervalo",["id_numero_oficio"],["inicio","fim"]
        );    
    }

    public function cadastrarIntervalo(
        int $idUsuario,
        int $numeroInicial,
        int $numeroFinal,
        ?string $observacao = null 
    ) : NumeroIntervalo {
        $this->id_usuario = $idUsuario;
        $this->inicio = $numeroInicial;
        $this->fim = $numeroFinal;
        $this->observacao = $observacao;
        return $this;
    }

    public function save() : bool
    {   
       $this->idRetorno = $this->create($this->safe());
       return true;    
    }

    public function getIdRetorno() : ?int
    {  
       return $this->idRetorno;  
    }

    public function verificarNumero(int $numeroInicio, int $numeroFim, int $idUnidade) : bool
    {


        if ($numeroInicio < 0 || $numeroFim < 0) {
            $this->message->warning("Os número não podem ser negativos!")->render();
            return false;
        }

        if ($numeroInicio > $numeroFim) {
            $this->message->warning("O número inicial não pode ser maior que o número final!")->render();
            return false;
        }

        $tabelaOriginal = static::$entity;

        $unidade = (new Unidade());

        $limiteNumero = $unidade->idUnidade($idUnidade)->limite_numero;
        if ($numeroFim - $numeroInicio > $limiteNumero) {
            $this->message->warning("O limite de números gerados por vez não pode ultrapassar {$limiteNumero}!")->render();
            return false;
        }
        
        static::$entity = $tabelaOriginal;

        if ($this->verificarNumeroBanco($numeroInicio, $numeroFim)){
            return false;
        } else {
             return true;
        } 
    }

    public function verificarNumeroBanco(int $numeroInicio, int $numeroFim) : bool
    {   
        $anoAtual = date('Y');

        $tabelaOriginal = static::$entity;

        $numeroOficio = (new NumeroOficio());

        for ($i = $numeroInicio; $i <= $numeroFim; $i++) {
            $numeroOficio->find("numero_oficio = :numero AND ano_oficio = :anoof","numero={$i}&anoof={$anoAtual}");
            $dados = $numeroOficio->fetch();

            if($dados){ 
                $this->message->warning("Esse intervalo, ou parte dos números desse intervalo já foram cadastrados!")->render();
                
                static::$entity = $tabelaOriginal;
                return true;
            }
        }

        static::$entity = $tabelaOriginal;
        return false; 
    }

    public function getHistorico(int $idUsuario) : ?NumeroIntervalo
    {   
        if (!$idUsuario) {
            return null;
        }
        $this->find("id_usuario = :id","id={$idUsuario}")->order("id_numero_intervalo DESC");
        return ($this->fetch());
    }       
}
