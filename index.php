<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Encuestas</title>
        <link rel="stylesheet" href="css/cssmulti.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel=icon href="img/icon/pregunta.png" type="image/png">
    </head>
    <body>
        <div class="container">
            <img src="img/banner/encabezado.jpg" class="img-responsive">
        </div>

            <div class="container">
                <br/><br/>
                <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <form action="conexion/validar.php" method="get" role="form">
                            <div class="form-group">
                                <label>No control:</label>
                                <input type="text" id="user" name="user" class="form-control" placeholder="No control" maxlength="8" required><br/>
                                <label>Password:</label>
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required><br/>
                                <input type="hidden" name="op" value="1"/>
                            </div>
                            <button class="btn btn-primary" type="submit">Login</button>
                                <a href="template/registro.php" class="btn btn-default">Registro</a>
                        </form>
                    </div>
                    <div class="col-xs-2"></div>
                </div>
            </div>
    </body>
    
    <!--Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
