<?php
 include_once '../conexion/conexion.php';
 session_start();
 $user =$_GET['user']; 
 $campos = $_GET['nombre_campo'];
 $ncontrol = $_GET['control'];
 $table = $_GET['table'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrador</title>
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
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

    </body>

    <?php
     $merino = new Connection();
     $data= $merino->imprimirValor($campos, $table);
    ?>
    
    <!--Script -->
   <script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
    <script src="../Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="../Highcharts-4.1.5/js/modules/funnel.js"></script>
    <script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>
    <script type="text/javascript">
    $(function () {
    $('#container').highcharts({
        title: {
            text: 'Aprovechamiento Exponencial, Encuenta <?php echo $table; ?>',
            x: -20 //center
        },
        subtitle: {
            text: '<?php 
            $merino = new Connection();
            $merino->MuestraNombre($ncontrol);?>',
            x: -20
        },
        xAxis: {

         categories: [1]
        },
        yAxis: {
            title: {
                text: 'Datos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{

            name: '<?php
                 $merino = new Connection();
                 $merino->recorrer($campos, $table);
                ?>',
              data: (function() {
                         var data = [];
                    <?php
                        for($i = 0 ;$i<count($data);$i++){
                    ?>
                    data.push([<?php echo $data[$i];?>]);
                    <?php } ?>
                return data;
                     })()
        }]
    });
});
    </script>


</html>