<?php
require_once "usuario/controle.php";
require_once "mensagem/controle.php";
require_once "persistencia/controle.php";

function criaControleUsuario() {
    $persistencia = criaPersistenciaUsuario();
    $controleUsuario = new ControleUsuario ($persistencia);
    return $controleUsuario;
}

function criaControleMensagem() {
    $persistencia = criaPersistenciaMensagem();
    $controleUsuario = new ControleMensagem ($persistencia);
    return $controleMensagem;
}
?>