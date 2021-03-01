<?php
chdir("../../");
require_once "controle.php";
$controleMensagem = new criaControleMensagem();
$controleMensagem->insereMensagem($_POST['texto']);

header("Location: /tripou/");

?>