<?php
 include_once '../conexion/conexion.php';
 session_start();
 $user =$_GET['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Encuesta ITO</title>
        <link rel="stylesheet" href="../css/cssmulti.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel=icon href="../img/icon/pregunta.png" type="image/png">
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
                <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8">
                  <?php
                    $profe = new Connection();
                    $profe->alumno($user);
                  ?>
                </div>
                <div class="col-xs-2"></div>
                </div>
            </div>
            <div class="container">
            <br/><br/><center>
                  <?php
                   echo "<div class='btn-group'>
                      <a href='contesta.php?user=$user&table=personales' class='btn btn-primary'>Personales</a>
                      <a href='contesta.php?user=$user&table=academicos' class='btn btn-primary'>Academicos</a>
                      <a href='contesta.php?user=$user&table=economicos' class='btn btn-primary'>Economicos</a>
                      <a href='contesta.php?user=$user&table=familiares' class='btn btn-primary'>Familiares</a>
                      <a href='contesta.php?user=$user&table=casa' class='btn btn-primary'>Casa</a>
                      <a href='contesta.php?user=$user&table=habitos' class='btn btn-primary'>Habitos</a>
                      <a href='../conexion/destruccion.php?op=1' class='btn btn-danger'><span class=''>Salir</span></a>
                  </div>";
                  ?>
                  </center>
            </div>
            <div class="container">
            <br/><br/><hr>
              <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8">
                  <?php
                      $profe = new Connection();
                      $table=$_GET['table'];
                      $profe->MuestraPregunta($table, $user);
                  ?>
                </div>
                <div class="col-xs-2"></div>
              </div>
            </div>
    </body>
    
    <!--Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>


