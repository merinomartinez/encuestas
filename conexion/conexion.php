<?php

     // se crea la clase Connection la cual contendra todo el contenido de funciones a ocupar..
    class Connection{
         

         // function conexion la cual realizara la interactua con la base de datos
        function Conexion(){
            $con=mysqli_connect("localhost","root","","encuestas");
            return $con;
        }
        

        // function registro 
        function registro($ncontrol,$pass2,$nombre,$ap,$am,$fna,$semes,$carrera,$email){
            $profe = new Connection();
            $query = "INSERT INTO datospersonales(ncontrol, password, nombre, ap, am, fecha, semestre, carrera, email) VALUES ('$ncontrol','$pass2','$nombre','$ap','$am','$fna','$semes','$carrera','$email')";
            $result=mysqli_query($profe->Conexion(), $query);
            header("Location: ../index.php");
        }
        
        
        // funcion session 
        function sesion($user, $table){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start']+(5*60);
            header("Location: ../template/contesta.php?user=".$_SESSION['user']."&table=".$table);
        }
        

        // function sesionAdmin 
        function sesionAdmin($user){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start']+(5*60);
            header("Location: ../template/agregaencuentas.php?user=".$_SESSION['user']);
        }
        

        // function destroy la cual mediante la opcion elimina la session iniciada
        function destroy($op){
            switch ($op)
            {
                case 1:{
                    session_destroy();
                    header("Location: ../index.php");
                }break;
                case 2:{
                    session_destroy();
                    header("Location: ../admin.php");
                }break;
            }
        }
        
        
        // function buscar busca por el numero de control del alumno
        function Buscar($user, $nocontrol, $table){
            header("Location: ../template/buscar.php?user=".$user."&ncontrol=".$nocontrol."&table=".$table);
        }

        function buscaGrafica($user, $nocontrol, $table){
            header("Location: ../template/graficas.php?user=".$user."&ncontrol=".$nocontrol."&table=".$table);
        }
        

        // function login ....
        function Login($user, $pass){
            $personales = "personales";
            if ($user !="" && $pass != "") {
                # code...
                $longitud = strlen($user);
                if ($longitud == 8) {
                    # code...
                
                $obj = new Connection();
                $query = "SELECT ncontrol, password FROM datospersonales WHERE ncontrol='$user' and password= '$pass'";
                $result=mysqli_query($obj->Conexion(), $query);
                if (mysqli_num_rows($result)>0) {
                        # code...
                        $obj->sesion($user, $personales);
                    }else{
                       header("Location: ../index.php"); 
                    }
                
            }else{
                header("Location: ../index.php");
            }

            }else{
                header("Location: ../index.php");
            }
            
        }
        
        

         // function admin en la cual verificamos si el usuario existe en nuestra base de datos
        function Admin($user, $pass){
            if ($user !="" && $pass != "") {
                # code...
                $longitud = strlen($user);
                if ($longitud == 5) {
                    $obj = new Connection();
                    $query = "SELECT user, pass FROM administrador WHERE user='$user' and pass='$pass'";
                    $result = mysqli_query($obj->Conexion(), $query);
                    if (mysqli_num_rows($result)>0) {
                        # code...
                        $obj->sesionAdmin($user);
                    }else{
                       header("Location: ../admin.php"); 
                    }
                    
                }else{
                    header("Location: ../admin.php");
                }

                }else{
                    header("Location: ../admin.php");
                }
        }
        


        // function generalConsulta en la que se registra la pregunta con su tipo de cualquier tabla
        function GeneralConsulta($table, $pregunta, $tipo, $user){
            $obj = new Connection();
            $query = "INSERT INTO $table (pregunta, tipo) VALUES ('$pregunta','$tipo')";
            $result=mysqli_query($obj->Conexion(),$query);
            if(!$result){
                echo "error consulta";
            }else{
                header("Location: ../template/general.php?user=".$user."&table=".$table);
            }
        }



        // function ViewTable en esta funcion muestra mediante una tabla las preguntas ingresadas de acuerdo a la tabla que se solicite es una consulta general 
        function ViewTable($table, $user){
            $obj = new Connection();
            $query = "SELECT * FROM $table";
            $result=mysqli_query($obj->Conexion(), $query);
        
            while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
            
            echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["pregunta"]."</td>
                        <td><a href='../template/updategral.php?id=".$row["id"]."&user=$user&table=$table' class='btn btn-default'>Update</a></td>
                      </tr>";

                  }

        }


        // function ViewUpdate la cual nos despliega mediante el identificador la pregunta a modificar...
        function ViewUpdate($table, $user, $id){
            $obj = new Connection();
            $query = "SELECT * FROM $table where id=$id";
            $result=mysqli_query($obj->Conexion(), $query);
        
            while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
            
            echo "<input type='text' name='pregunta' class='form-control' value='".$row["pregunta"]."'>
                    <br/>
                    <select name='tipo' class='form-control'>
                      <option>Abierta</option>
                      <option>Si,No</option>
                    </select>
                    <input type='hidden' name='table' value='$table'/>
                    <input type='hidden' name='user' value='$user'/>
                    <input type='hidden' name='id' value='$id'/>
                    ";

                  }

        }



        // function alumno despliega la informacion del alumno mediante el numero de control
        function alumno($nocontrol){
            $obj = new Connection();
            $query = "SELECT * FROM datospersonales WHERE ncontrol='$nocontrol' ";
            $result=mysqli_query($obj->Conexion(), $query);
             if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                
                echo "<div class='row'>
                        <div class='col-xs-1'><label>".$row["ncontrol"]."</label></div>
                        <div class='col-xs-4'><label>&nbsp;&nbsp;&nbsp;&nbsp;".$row["ap"]." ".$row["am"]."</label></div>
                        <div class='col-xs-3'><label>".$row["nombre"]."</label> </div>
                      </div>
                      <div class='row'>
                      <div class='col-xs-6'><label>".$row["carrera"]."</label></div>
                      <div class='col-xs-2'><label>".$row["semestre"]."</label></div>
                      <br/>
                      </div>
                      ";

                      } 
            }           
        }




        // function updategral el cual realiza una actualizacion de cualquier tabla mediante su identificador...
        function updategral($table, $pregunta, $tipo, $user, $id){
            $obj = new Connection();
            $query = "UPDATE $table SET pregunta ='$pregunta', tipo='$tipo' where id=$id";
            $result=mysqli_query($obj->Conexion(),$query);
            if(!$result){
                //header("Location: ../admin.php");
                echo "error consulta";
            }else{
                header("Location: ../template/general.php?user=".$user."&table=".$table);
            }
        }




        // function muestraresp muestra las respuesta del alumno mediante la encuesta realizada
        function muestraresp($nocontrol, $table, $user){
            if($nocontrol != "" && $table !=""){
                $obj = new Connection();
                $query = "SELECT repuesta.repuesta, repuesta.tabla, repuesta.id, repuesta.calificacion, $table.pregunta FROM repuesta 
                LEFT JOIN $table ON $table.id = repuesta.id_pregunta where nocontrol=$nocontrol and tabla = '$table' ";
                $result = mysqli_query($obj->Conexion(), $query);

                while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                        echo "<tr>
                        <td>".$row["pregunta"]."</td>
                        <td>".$row["repuesta"]."</td>
                        <td>".$row["tabla"]."</td>";

                         $comp = $row["calificacion"];
                        if($comp !=0)
                        echo "
                        <td>".$row["calificacion"]."</td>";
                        else{
                        echo "<td><select name='".$row["id"]."' class='form-control'>
                        <option>Calificar...</option>";
                        for ($i=1; $i <11 ; $i++) { 
                            # code...
                        echo "<option>".$i."</option>";
                          }
                        }

                        echo "
                        </select>
                        </td>
                        </tr>";
                    }
            }else{}

        }


        function Graficar($nocontrol, $table, $user){
            if($nocontrol != "" && $table !=""){
                $obj = new Connection();
                $query = "SELECT repuesta.repuesta, repuesta.tabla, repuesta.id, repuesta.calificacion, repuesta.id_pregunta, $table.pregunta FROM repuesta 
                LEFT JOIN $table ON $table.id = repuesta.id_pregunta where nocontrol=$nocontrol and tabla = '$table' ";
                $result = mysqli_query($obj->Conexion(), $query);

                while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                        echo "<tr>
                        <td>".$row["pregunta"]."</td>
                        <td>".$row["repuesta"]."</td>
                        <td>".$row["tabla"]."</td>";

                         $comp = $row["calificacion"];
                        if($comp !=0){
                        echo "
                        <td>".$row["calificacion"]."</td>";
                              echo "
                        <td><input type='checkbox' name='nombre_campo[]' value='".$row["id_pregunta"]."'>".$row["id_pregunta"]."</label></td>
                        <td><input type='text' name='nombre_campo[]' class='form-control' placeholder='Valor'/></td>
                        <td><input type='text' name='nombre_campo[]' class='form-control' placeholder='valor 2'/></td>
                        </tr>";
                    }
                }
            }else{}

        }




        // function MuestraPregunta la cual despliega la pregunta y mediante el tipo de la cual sea despliega las opciones...
        function MuestraPregunta($table, $user){
            
            $obj = new Connection();
            $query = "SELECT id, pregunta, tipo FROM $table WHERE id not in (select id_pregunta from repuesta WHERE repuesta.tabla='$table' and repuesta.nocontrol=$user)";

            $result = mysqli_query($obj->Conexion(), $query);
            
            
            if(mysqli_num_rows($result)>0){
            echo "<form action='../conexion/contesta.php' method='get' role='form'>
                  <div class='form-group'>";
                
            while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){

                if ($row["tipo"] == "Abierta") {
                    echo " 
                        
                        <label>".$row["pregunta"]."</label>
                        <input type='' name='".$row["id"]."' class='form-control' placeholder=''>
                        ";
                    }
                else{
                    
                    echo "
                        <br/>
                        <label>".$row["pregunta"]."&nbsp;&nbsp;</label>
                        <label class='radio-inline'><input type='radio' name='".$row["id"]."' value='SI'>SI</label>
                        <label class='radio-inline'><input type='radio' name='".$row["id"]."' value='NO'>NO</label>
                        <br/><br>
                        ";
                    } 
                }

            echo " <input type='hidden' name='table' value='$table'/>
                   <input type='hidden' name='user' value='$user'/>
                   </div>
                   <button type='submit' class='btn btn-primary'>Contestar</button></form>";
            }else{}

            
        }// termina function...

        function MuestraNombre($nocontrol){
            $obj = new Connection();
            $query = "SELECT * FROM datospersonales WHERE ncontrol='$nocontrol' ";
            $result=mysqli_query($obj->Conexion(), $query);
             if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                echo $row["carrera"]."  ".$row["nombre"]." ".$row["ap"]." ".$row["am"];

                } 
            }           
        }


        function recorrer($campo, $table){
            $obj = new Connection();
                 $resultado = count($campo);
                 for ($i=0; $i<$resultado;$i++) { 
                     # code...
                if($campo[$i] !=""){
                    $mod=$i%3;
                    if($mod==0){
                        $query = "SELECT repuesta.tabla, repuesta.id_pregunta, $table.pregunta FROM repuesta LEFT JOIN $table ON $table.id = repuesta.id_pregunta where id_pregunta=$campo[$i] and tabla = '$table'";
                        $result=mysqli_query($obj->Conexion(), $query);
                         while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                            echo $row["pregunta"]."<br/>";
                        }
                    }
                    
                 }
             }
             
        }

        function imprimirValor($campo,$table){
            #Code ...
             $obj = new Connection();
            foreach ($campo as $num) {
                # code...
                if ($num !="") {
                    # code...
                    $arreglo []=$num;                  
                }
               
            }
            $contar = count($arreglo);
            for ($i=0; $i <$contar; $i++) { 
                # code...
                if ($i%3!=0) {
                    # code... 
                    //echo "valor de mi arreglo: ".$arreglo[$i].",";
                    $vector []= $arreglo[$i];
                }else{
                    
                    $query = "SELECT repuesta.tabla,repuesta.calificacion, repuesta.id_pregunta, $table.pregunta FROM repuesta LEFT JOIN $table ON $table.id = repuesta.id_pregunta where id_pregunta=$arreglo[$i] and tabla = '$table'";
                        $result=mysqli_query($obj->Conexion(), $query);
                         while($row = mysqli_fetch_array($result,MYSQL_ASSOC) ){
                            $califica[]= $row["calificacion"];
                        }
                }
             }
             $contador=0;
             $contar = count($vector);
             //echo "valor de contar = ".$contar;
             $i=0;
             $resul= count($califica);
             if($contador<=2 && $contador<$contar){
                if ($resul==2) {
                    # code...
                //echo "entra cuando resul == 2";
                 $calculo = $vector[$contador]*$califica[0];
                 //echo "<br/>calificacion encuesta: ".$califica[0]."*".$vector[$contador]."=".$calculo."<br/>";
                 $exponencial=$calculo*$vector[$contador];
                 //echo "<br> resultado".$calculo."*".$vector[$contador]."=".$exponencial;
                 $contador++;
                }else{

                //echo "si no se cumple que sea == 2";
                $calculo = $vector[$contador]*$califica[0];
                 //echo "<br/>calificacion encuesta: ".$califica[0]."*".$vector[$contador]."=".$calculo."<br/>";
                 $contador++;
                 $exponencial=$calculo*$vector[$contador];
                 //echo "<br> resultado".$calculo."*".$vector[$contador]."=".$exponencial;

                 $serie = $vector[$contador];
                 $calc = $exponencial/$serie;
                 //echo "<br/>calc: ".$calc."<br/>";
                 $suma=0;
                 while ($suma <$exponencial) {
                     # code...
                    $suma = $suma+$calc;
                    $nuevo[]=$suma; 
                 }
            }

            }


            return $nuevo;
              
        }



} // termina la clase Connetion 

?>

