<?php

namespace Source\Support;

use Source\Core\Session;

/**
 * FSPHP | Class Message
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Core
 */
class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    private $img;

    private $titulo;
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public function getImg() : ?string
    {
        return $this->img;    
    }

    public function getTitulo() : ?string
    {
        return $this->titulo;    
    }

    /**
     * @param string $message
     * @return Message
     */
    public function info(string $message): Message
    {
        $this->type = CONF_MESSAGE_INFO;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function success(string $message): Message
    {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);
        $this->img = CONF_IMG_SUCESS;
        $this->titulo = "Sucesso!";
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function warning(string $message): Message
    {
        $this->type = CONF_MESSAGE_WARNING;
        $this->text = $this->filter($message);
        $this->img = CONF_IMG_WARNING;
        $this->titulo = "Atenção!";
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function error(string $message): Message
    {
        $this->type = CONF_MESSAGE_ERROR;
        $this->text = $this->filter($message);
        $this->img = CONF_IMG_ERROR;
        $this->titulo = "Erro!";
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        // return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";
        return "<div class=\"fixed top-4 right-4 z-50 max-w-sm w-full\">
                    <div class=\"{$this->getType()} shadow-md flex items-start gap-2 animate-fade-in\">
                        {$this->getImg()}
                    <div>
                        <strong class=\"block\">{$this->getTitulo()}</strong>
                            <span>{$this->getText()}</span>
                    </div>
            </div>";
    }

    /**
     * @return string
     */
    public function json(): string
    {
        return json_encode(["error" => $this->getText()]);
    }

    /**
     * Set flash Session Key
     */
    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_STRIPPED);
    }
}