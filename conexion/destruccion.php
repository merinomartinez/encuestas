<?php
    include_once 'conexion.php';
    $op = $_GET['op'];
    $profe = new Connection();
    $profe->destroy($op);
?>