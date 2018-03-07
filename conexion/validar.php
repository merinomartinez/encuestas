<?php

    include_once 'conexion.php';
    $user1 = $_GET['user'];
    $pass2 = $_GET['pass'];
    $op = $_GET['op'];
    
    switch ($op){
         case '1':{
            $con = new Connection();
            $con ->Login($user1, $pass2);
         }break;
         case '2':{
            $con = new Connection();
            $con ->Admin($user1, $pass2);
         }break;
    }
    
?>

