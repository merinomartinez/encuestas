<?php
    include_once 'conexion.php';

    $pregunta = $_GET['pregunta'];
    $tipo = $_GET['tipo'];
    $table = $_GET['table'];
    $user = $_GET['user'];
    $id = $_GET['id'];

	$profe = new Connection();
	$profe->updategral($table, $pregunta, $tipo, $user, $id);	
?>