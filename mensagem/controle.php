<?php

	require_once "mensagem/modelo.php";
	require_once "usuario/sessao.php";

	class ControleMensagem {
		private $persistencia;
		
		function __construct(PersisteMensagem $persistencia) {
			$this->persistencia = $persistencia;
		}
		
		function getMensagens(){
			return array_reverse ($this->persistencia->carregaMensagens());
		}
		
		function insereMensagem($texto) {
			$sessao = new Sessao();
			$quem = $sessao->getLogin();
			$quando = date("Y-m-d H:i:s");
			$mensagem = criaMensagem($texto, $quem, $quando);
			$this->persistencia->salvaMensagem($mensagem);
		}

		function removeMensagem($quem, $quando) {
			$sessao = new Sessao();
			$login = $sessao->getLogin();
			if ($login == $quem) {
				$mensagem = criaMensagem("", $quem, $quando);
				$this->persistencia->removeMensagem($mensagem);
			}
		}
	}
	
?>