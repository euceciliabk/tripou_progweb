<?php

interface PersisteMensagem {
	function carregaMensagens();
	function salvaMensagem($mensagem);
	function removeMensagem($mensagem);
}

function criaMensagem($texto, $quem, $quando) {
	$mensagem = array();
	$mensagem['texto'] = $texto;
	$mensagem ['quem'] = $quem;
	$mensagem ['quando'] = $quando;
	return $mensagem;
}

?>