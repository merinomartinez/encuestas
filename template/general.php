<?php
 include_once '../conexion/conexion.php';
 session_start();
 $user =$_GET['user'];
 $table =$_GET['table'];
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
                                   $user =$_GET['user'];  
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
                      <a href='general.php?user=$user&table=familiares' class='btn btn-default'>Familiares</a>
                      <a href='general.php?user=$user&table=casa' class='btn btn-default'>Casa</a>
                      <a href='general.php?user=$user&table=habitos' class='btn btn-default'>Habitos</a>
                      <a href='buscar.php?user=$user&ncontrol= &table=' class='btn btn-default'>Calificar</a>
                      <a href='graficas.php?user=$user&ncontrol= &table=' class='btn btn-default'>Graficas</a>
                  </div>";
                  ?>
                </div>
                <div class="col-xs-8">
                  <h1>Encuesta <?php echo $table; ?></h1>
                  <br/><br/>
                  <?php
                    echo "<a href='encuesta.php?user=$user&table=$table' class='btn btn-primary'>Nueva Pregunta</a>";
                  ?>
                  <br/><br/>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr class="active">
                        <td>No pregunta</td>
                        <td>Pregunta</td>
                        <td>Opciones</td>
                      </tr>
                      <?php
                        $profe = new Connection();
                        $profe->ViewTable($table, $user);
                      ?>
                      <a href="../template/updategral.php?id='$row['id']'"></a>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </body>
    
    <!--Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>


