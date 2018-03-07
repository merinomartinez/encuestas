<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Encuestas</title>
        <link rel="stylesheet" href="../css/cssmulti.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel=icon href="../img/icon/pregunta.png" type="image/png">
    </head>
    <body>
        <div class="container">
            <img src="../img/banner/encabezado.jpg" class="img-responsive">
        </div>
        
        <div class="container">
            <br/><br/>
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8">
                    <form action="../conexion/agregar.php" method="post" role="form">
                        <div class="form-group">
                            <label>No de control</label>
                            <input type="text" id="ncontrol" name="ncontrol" class="form-control" placeholder="No de control" required>     
                            <label>Password</label>
                            <input type="password" id="ncontrol" name="pass" class="form-control" placeholder="Password" required>
                            <label>Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nombre (s)" required>
                            <label>Apellido Paterno</label>
                            <input type="text" id="ap" name="ap" class="form-control" placeholder="Apellido Paterno" required>
                            <label>Apellido Materno</label>
                            <input type="text" id="am" name="am" class="form-control" placeholder="Apellido Materno" required>
                            <label>Fecha Nacimiento</label>
                            <input type="text" id="fn" name="fn" class="form-control" placeholder="Fecha de nacimiento" required>
                            <label>Semestre</label>
                            <select name="semestre" class="form-control" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                            </select>
                            <label>Carrera</label>
                            <select name="carrera" class="form-control" required>
                                <option>Elige tu carrera..</option>
                                <option>Ingenieria Informatica</option>
                                <option>Gestion Empresarial</option>
                                <option>Ingenieria Mecanica</option>
                                <option>Ingenieria Quimica</option>
                                <option>Ingenieria Industrial</option>
                                <option>Ingenieria Electrica</option>
                                <option>Ingenieria Electronica</option>
                                <option>Licenciatura en Informatica</option>
                                <option>Ingenieria en Sistemas</option>
                            </select>
                            
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" required> 
                            <center>
                            <br/>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            </center>
                        </div>
                    </form>
                </div>
                <div class="col-xs-2"></div>
            </div>
        </div>
    </body>
    <!--Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>

