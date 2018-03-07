<?php
	include_once 'conexion.php';
	$user=$_GET['user'];
	$table = $_GET['table'];
	$ncontrol = $_GET['ncontrol'];

	$profe = new Connection();
	$profe->buscaGrafica($user, $ncontrol, $table);
?>