<?php
 session_start();
$table=$_GET['table'];
$user =$_GET['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrador</title>
        <link rel="stylesheet" href="../css/cssmulti.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel=icon href="../img/icon/admin.jpg" type="image/png">
    </head>
    <body>
        <div class="container">
            <div class="row">
              <div class="col-xs-2"></div>
              <div class="col-xs-8"><img src="../img/banner/encabezado.jpg" class="img-responsive"></div>
              <div class="col-xs-2"></div>
            </div>
        </div>

            <div class="container">
                <br/><br/>
                <!--<div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">-->

                        <nav class="navbar navbar-default" role="navigation">
                          <!-- El logotipo y el icono que despliega el menú se agrupan
                               para mostrarlos mejor en los dispositivos móviles -->
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-ex1-collapse">
                              <span class="sr-only">Desplegar navegación</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                              <a class="navbar-brand" href="#"><span class="">Home</span></a>
                          </div>
                          
                          <p class="navbar-text pull-right">
                                  <?php     
                                     
                                    echo "Conectado como <a href='../conexion/destruccion.php?op=2' class='navbar-link'><span class=''>".$user."</span></a>";
                                   ?>                                      
                              </p>
                        </nav>
                        
                   <!-- </div>
                    <div class="col-xs-2"></div>
                </div>-->
            </div>

            <div class="container">
              <div class="row">
                <div class="col-xs-4">
                  <?php
                   echo "<div class='btn-group-vertical'>
                      <button class='btn btn-primary'>Preguntas</button>
                      <a href='general.php?user=$user&table=personales' class='btn btn-default'>Personales</a>
                      <a href='general.php?user=$user&table=academicos' class='btn btn-default'>Academicos</a>
                      <a href='general.php?user=$user&table=economicos' class='btn btn-default'>Economicos</a>
                      <a href='familiares.php?user=$user&table=familiares' class='btn btn-default'>Familiares</a>
                      <a href='general.php?user=$user&table=casa' class='btn btn-default'>Casa</a>
                      <a href='general.php?user=$user&table=habitos' class='btn btn-default'>Habitos</a>
                      <a href='graficas.php?user=$user' class='btn btn-default'>Graficas</a>
                  </div>";
                  ?>
                </div>
                <div class="col-xs-8">
                  <h1>Nueva Pregunta</h1>
                  <form action="../conexion/encuesta.php" method="get" role="form">
                  <div class="form-group">
                    <input type="text" name="pregunta" class="form-control" placeholder="Ingrese la Pregunta">
                    <br/>
                    <select name="tipo" class="form-control">
                      <option>Elegir tipo...</option>
                      <option>Abierta</option>
                      <option>Si,No</option>
                    </select>
                    <?php
                     
                      echo "<input type='hidden' name='table' value='$table'/>";
                      echo "<input type='hidden' name='user' value='$user'/>";
                    ?>
                    <br/><button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    </body>
    
    <!--Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>


