<?php

function redirecionar($destino){
     unset($_COOKIE['PHPSESSID']);
     setcookie('PHPSESSID', null, -1, $destino);
    return header('Location: '.$destino);
}

function inserirMensagem($indice, $mensagem)
{

    if (!isset($_SESSION[$indice][$indice])) {
        $_SESSION[$indice][$indice] = $mensagem;
    }
}

function exibirMensagem($indice, $style = 'red')
{
    if (isset($_SESSION[$indice][$indice])) {
        $msg = $_SESSION[$indice][$indice];
        unset($_SESSION[$indice][$indice]);
        return "<span style = 'color: {$style};'>{$msg}</span>";
    }
}

function errorEredirect($indice, $mensagem, $redirect)
{
    inserirMensagem($indice, $mensagem);
    redirecionar($redirect);
}

function dadosPagina($indice, $dado)
{
    inserirMensagem('dado_' . $indice, $dado);
}

function exibirDado($indice)
{
    if (isset($_SESSION[$indice][$indice])) {
        $msg = $_SESSION[$indice][$indice];
        unset($_SESSION[$indice][$indice]);
        return $msg;
    }
}
