<?php
require_once "persistencia/mysql/usuario.php";
require_once "persistencia/mysql/mensagem.php";

function criaPersistenciaUsuario() {
    return new PersistenciaUsuario();
}

function criaPersistenciaMensagem() {
    return new PersistenciaMensagem();
}
?>