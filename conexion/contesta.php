<?php
    //include_once 'conexion.php';
	$table = $_GET['table'];
	$nocontrol= $_GET['user'];
    $con = mysqli_connect("localhost","root","","encuestas");
    $query = "SELECT * FROM $table";
    $result= mysqli_query($con, $query);
            
    while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
	    
	    $respuesta = $_GET[ $row["id"] ];
	    
	    if($respuesta !=""){
	    	$query = "INSERT INTO repuesta (repuesta, tabla,id_pregunta, nocontrol) VALUES ('$respuesta','$table',".$row["id"].", $nocontrol)";
   			$consulta= mysqli_query($con, $query);
	    	//echo "respuesta: ".$respuesta." # control: ".$nocontrol." table: ".$table."<br/>";
	    }
	}
	header("Location: ../template/contesta.php?user=".$nocontrol."&table=".$table);
?>