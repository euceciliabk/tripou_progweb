<?php
	require_once "controle.php";
	$controleMensagem = criaControleMensagem();
	$mensagens = $controleMensagem->getMensagens();
	
	foreach($mensagens as $mensagem) {
		echo "<br><div>";
		echo $mensagem['quem'] . "(". $mensagem['quando'] . ")<br>";
		echo $mensagem['texto'];
		require 'views/mensagem/removemsgform.php';
		echo "</div>";
	}
?>