<?php

function getConexao( ){
    $hostname = 'localhost';
	$database = 'tripou';
	$username = 'root';
	$password = '';
	$stringconexao = "host=$hostname dbname=$database user=$username
	password=$password";
	
    return pg_connect($stringconexao);
}

?>