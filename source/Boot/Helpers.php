<?php

// URL

function url(?string $path = null) : string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost") !== false) {
        if ($path) {
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1): $path);
        }
        return CONF_URL_TEST;
    }
    
    if ($path) {
        return CONF_URL_BASE . "/" . ($path[0] == "/"? mb_substr($path, 1) : $path);
    }

    return CONF_URL_BASE;
}

function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

// ASSETS
function themes(?string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost") !== false) {
        if ($path) {
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/";
    }

    if ($path) {
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/";
}


// Verificação

function csrf_input(): string
{
    $session = new \Source\Core\Session();
    $session->csrf();
    return "<input type='hidden' name='csrf' value ='" . ($session->csrf_token ?? "") . "'/>";
}

function csrf_verify($request) : bool
{
    $session = new \Source\Core\Session();
    if (empty($session->csrf_token) || empty($request['csrf'] || $request['csrf'] != $session->csrf_token)) {
        return false;
    }    
    return true;
}

function flash() : ?string
{
    $session = new \Source\Core\Session();
    if ($flash = $session->flash()) {
        echo $flash;
    }
    return null;    
}

function formatoNumero($numero) {
    return sprintf('%04d', $numero);
}

function tempoDecorrido (string $dataHora): string
{
    $data = new DateTime($dataHora);
    $agora = new DateTime();
    $diferenca = $data->diff($agora);

    $partes = [];

    if ($diferenca->days > 0) {
        $dias = $diferenca->days;
        $partes[] = $dias === 1 ? "1 dia" : "{$dias} dias";
    }

    if ($diferenca->h > 0) {
        $horas = $diferenca->h;
        $partes[] = $horas === 1 ? "1 hora" :"{$horas} horas";
    }

    if ($diferenca->i > 0) {
        $minutos = $diferenca->i;
        $partes[] = $minutos === 1 ? "1 minuto" : "{$minutos} minutos";
    }

    if (empty($partes)) {
        return "agora mesmo";
    }

    return "há " . implode(" e ", array_filter([
        implode(", ", array_slice($partes, 0, -1)),
        end($partes)
    ]));

}

function formatoData($dataAtual){
    $data = new DateTime($dataAtual);
    return $data->format("d/m/Y H:i:s");
}

