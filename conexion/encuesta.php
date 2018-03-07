<?php
    include_once 'conexion.php';

    $pregunta = $_GET['pregunta'];
    $tipo = $_GET['tipo'];
    $table = $_GET['table'];
    $user = $_GET['user'];

	$profe = new Connection();
	$profe->GeneralConsulta($table, $pregunta, $tipo, $user);	
?>