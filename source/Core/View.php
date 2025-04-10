<?php

namespace Source\Core;

use League\Plates\Engine;

class View
{
    private $engine;

    public function __construct(string $local = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT)
    {
        
        $this->engine = new Engine($local, $ext);
        
    }

    public function caminho(string $nome, string $local) : View
    {
        $this->engine->addFolder($nome, $local);
        return $this;    
    }

    public function renderizar(string $nomeModelo, array $dado) : string
    {
        return $this->engine->render($nomeModelo, $dado);
    }

    public function engine() : Engine
    {
        return $this->engine();    
    }

}
