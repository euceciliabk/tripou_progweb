<?php

function getConexao( ){
    $hostname = 'localhost';
	$database = 'tripou';
	$username = 'root';
	$password = '';
	$mysqlconnection = new mysqli($hostname, $username, 
    $password, $database);
    return $mysqlconnection;
}

?>