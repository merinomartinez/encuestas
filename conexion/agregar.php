<?php
  include_once 'conexion.php';
  
    $ncontrol = $_POST['ncontrol'];
    $pass2 = $_POST['pass'];
    $nombre = $_POST['name'];
    $ap = $_POST['ap'];
    $am = $_POST['am'];
    $fna = $_POST['fn'];
    $semes = $_POST['semestre'];
    $carrera = $_POST['carrera'];
    $email  =$_POST['email'];
    
    $profe = new Connection();
    $profe->registro($ncontrol,$pass2,$nombre,$ap,$am,$fna,$semes,$carrera,$email);
 
?>

