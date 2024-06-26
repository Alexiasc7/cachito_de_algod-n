<?php 

session_start();

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
<?php 

require 'database/conexion_bd.php';

$obj = new BD_PDO();

if (isset($_POST['btniniciar'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    //var_dump($correo, $contrasena);
    $datos = $obj->Ejecutar_Instruccion("Select * from usuarios where correo='$correo' and contrasena='$contrasena'" );

    if (@$datos[0][0] > 0) {
        $_SESSION['id_usua'] = $datos[0][0];
        $_SESSION['correo'] = $datos[0][1];
        $_SESSION['usuario'] = $datos[0][2];
        $_SESSION['privilegio'] = $datos[0][3];

        // Verificar si el usuario es administrador
        if ($_SESSION['privilegio'] == 'admin') {
            // Redireccionar al usuario a la página de administrador
            echo '<script>window.location = "admin.html"; </script>';
            exit; // Detener la ejecución del script después de la redirección
        } else {
            // Redireccionar al usuario a otra página (por ejemplo, index.php)
            echo '<script>window.location = "index_sesion.php"; </script>';
            exit; // Detener la ejecución del script después de la redirección
        }
    } else {
        echo "<script>alert('Correo incorrecto o Contraseña incorrecta')</script>";
    }
}
?>
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
                        <li><a href="recuperacion.php">¿Olvidaste la contraseña?</a></li>
                        <li><a href="registro.php">¿No tienes cuenta?</a></li>
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
                              <h4>Iniciar Sesión</h4>
                              <div class="line-dec"></div>
                              <br>
                              <br>
                            </div>
                            <form action="login.php" method="post">
                              <div class="form-group">
                                <input type="text" class="form-login" placeholder="Nombre de usuario" name="correo" id="correo" required>
                              </div>
                              
                              <div class="form-group">
                                <input type="password" class="form-login" placeholder="Contraseña" name="contrasena" id="contrasena" required>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <div class="text-content white-button">
                                  <input type="submit" name="btniniciar" class="btn btn-success" id="btniniciar"  value="Ingresar">
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