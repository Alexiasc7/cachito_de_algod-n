<?php

//IMPORTA ARCHIVO DE CONEXION QUE CONTIENE LA CLASE DE CONEXION A MYSQL//
    require 'database/conexion_bd.php';
//CREAR EL OBJETO DE LA CLASE BD_PDO//
    $obj = new BD_PDO();
//REALIZAMOS UNA PETICION SQL AL SERVER A TRAVES DEL OBJETO//
    $tblcorreo = $obj->Ejecutar_Instruccion("SELECT * from correos ");

    if(isset($_POST['botoninsertar']))
    {
            
            $id_correo = $_POST['id_correo'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];

            $obj->Ejecutar_Instruccion("INSERT INTO `correos` (`nombre`, `correo`, `mensaje`)  
            VALUES ('$nombre','$correo','$mensaje');");
           
          header("location: contactanos_sesion.php");
          
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
                        <li><a href="index.php" >Inicio</a></li>
                        <li><a href="conocenos_sesion.php" >Conocenos</a></li>
                        <li><a href="contactanos_sesion.php" class="scroll-top" >Contacto</a></li>
                        <li><a href="galeria.php">Proyectos</a></li>
                        <li><a href="ideas.php">Ideas</a></li>
                        <li><a href="tutos.php">Tutoriales</a></li>
                        <li><a href="login.php">Iniciar sesion</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->

    <div id="blog" class="page-section">
        <div class="recuadro">
            <br>
        <br>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="map">
                        <img src="img/map.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                      <form id="contact" action="conocenos_sesion.php" method="post" name="formularioinsertar" enctype="multipart/form-data">
                      <div class="col-md-6">
                          <fieldset>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Tu nombre..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <fieldset>
                            <input name="correo" type="email" class="form-control" id="correo" placeholder="Tu email..." required="">
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <fieldset>
                            <textarea name="mensaje" rows="6" class="form-control" id="mensaje" placeholder="Tu mensaje..." required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                         
                          <input type="submit" name="botoninsertar" class="btn btn-success" id="botoninsertar"  value="Enviar">
                          
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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