<?php

	$user = $_GET['user'];
	$tabla = $_GET['table'];
	$nocontrol = $_GET['control'];

    $con = mysqli_connect("localhost","root","","encuestas");
    $query = "SELECT * FROM repuesta WHERE nocontrol= $nocontrol and tabla='$tabla'";
    $result= mysqli_query($con, $query);
            
    while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
	    
	    $update  = $_GET[$row["id"]];
	    
	    if($update !=""){
	    	$query = "UPDATE repuesta SET calificacion = $update WHERE id=".$row["id"];
   			$consulta= mysqli_query($con, $query);
	    }
	}
	header("Location: ../template/buscar.php?user=".$user."&ncontrol=".$nocontrol."&table=".$tabla);
?>