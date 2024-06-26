<?php
session_start();

require 'database/conexion_bd.php';
$obj = new BD_PDO();

if (isset($_POST['btnrecuperar'])) {
    $correo = $_POST['correo'];

    // Verificar si el correo existe en la base de datos
    $datos = $obj->Ejecutar_Instruccion("SELECT * FROM usuarios WHERE correo='$correo'");

    if (@$datos[0][0] > 0) {
        // Generar una nueva contraseña aleatoria
        $nueva_contrasena = generarContrasenaAleatoria();

        // Actualizar la contraseña en la base de datos para ese usuario
        $obj->Ejecutar_Instruccion("UPDATE usuarios SET contrasena='$nueva_contrasena' WHERE correo='$correo'");

        // Mostrar un mensaje con la nueva contraseña
        echo "<script>alert('Se ha generado una nueva contraseña para tu cuenta. Tu nueva contraseña es: $nueva_contrasena');</script>";
    } else {
        echo "<script>alert('El correo proporcionado no está registrado en nuestro sistema.');</script>";
    }
}

// Función para generar una contraseña aleatoria
function generarContrasenaAleatoria($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud_caracteres = strlen($caracteres);
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $indice = rand(0, $longitud_caracteres - 1);
        $contrasena .= $caracteres[$indice];
    }
    return $contrasena;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cachito de algodón</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top">
                        <div class="logo"></div>
                    </a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="login.php">¿Ya tienes cuenta?</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->
    </div>
    <section class="cd-hero">
        <div id="login">
                    <div class="container">
                        <div class="row">
                          <div id="form-login" class="col-md-6 col-md-offset-3">
                            <div class="section-heading">
                              <h4>Recuperar contraseña</h4>
                              <div class="line-dec"></div>
                              <br>
                              <br>
                            </div>
                            <form action="recuperacion.php" method="post">
                              <div class="form-group">
                                <input type="text" class="form-login" placeholder="Correo de usuario" name="correo" id="correo" required>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <div class="text-content white-button">
                                  <input type="submit" name="btnrecuperar" class="btn btn-success" id="btnrecuperar"  value="Ingresar">
                                  </div>                            
                                </fieldset>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
        </div>
    </section> 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2024 Cachito de algodón
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-icons">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
