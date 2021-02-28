<?php

require_once "mensagem/modelo.php";
require_once "persistencia/mysql/conexao.php";

class PersistenciaMensagem implements PersisteMensagem {
	private $persistencia;
	
	function __construct() {
		$this->persistencia = getConexao();
	}
	
	function criaTabelaMensagens() {
		$query = "CREATE TABLE IF NOT EXISTS mensagens (
			texto VARCHAR(128) NOT NULL,
			tempo TIMESTAMP NOT NULL,
			id INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (id),
			usuid INT NOT NULL,
			FOREIGN KEY (usuid) REFERENCES usuarios(id)
		)";
		$result = $this->persistencia->query($query);
		return $result;
	}
	
	private function getUsuarioId($login){
		$query = "SELECT id FROM usuarios WHERE login='$login' LIMIT 1";
		$result = $this->persistencia->query($query);
		$usuid = NULL;
		if ($result && $result->num_rows > 0) {
			$usuid = $result->fetch_array(MYSQLI_ASSOC)['id'];
		}
		return $usuid;
	}

	function removeMensagem($mensagem) {
		$usuid = $this->getUsuarioId($mensagem['quem']);
		$tempo = $mensagem['quando'];
		$query = "DELETE FROM mensagens WHERE usuid='$usuid' AND 
		tempo='$tempo'";
		$this->persistencia->query($query);
	}
	
	function salvaMensagem($mensagem) {
		$usuid = $this->getUsuarioId($mensagem['quem']);
		$result = NULL;
		if ($usuid) {
			$texto = $mensagem['texto'];
			$tempo = $mensagem['quando'];
			$query = "INSERT INTO mensagens (texto, tempo, usuid) VALUES ('$texto', '$tempo', '$usuid')";
			$result = $this->persistencia->query($query);
		}
		return $result;
	}
	
	private function getLoginUsuario($usuid) {
		$query = "SELECT login FROM usuarios WHERE id='$usuid' LIMIT 1";
		$result = $this->persistencia->query($query);
		$login = NULL;
		if ($result && $result->num_rows > 0) {
			$login = $result->fetch_array(MYSQLI_ASSOC)['login'];
		}
		return $login;
	}
	
	function carregaMensagens(){
		$query = "SELECT * FROM mensagens";
		$result = $this->persistencia->query($query);
		$mensagens = array();
		if ($result && $result->num_rows > 0){ //importante
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){
				$login = $this->getLoginUsuario($row['usuid']);
				$mensagem = criaMensagem($row['texto'], $login, $row['tempo']);
				array_push($mensagens, $mensagem);
			}
		}
		return $mensagens;
	}
	
}

?>