<?php
chdir("../../");
require_once "controle.php";
$controleMensagem = criaControleMensagem();
$controleMensagem->removeMensagem($_POST['quem'], $_POST
['quando']);


header("Location: /tripou/");
?>