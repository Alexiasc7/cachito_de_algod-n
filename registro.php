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
<script>
      function eliminar(id)
	{   
		if(confirm("¿ Estas seguro de eliminar el registro ?"))
		{
			window.location = "registro_tutos.php?ideliminar=" + id;
		}
    
	}

  function modificar(id)
	{
        if (confirm("¿ Estas seguro de modificar el registro ?")) {
            window.location = "registro_tutos.php?id_tutorial=" + id; 
        }
	}

  //BLOQUEO de la tecla ENTER para evitar enviar un campo vacio
  window.addEventListener("keypress", function(event){
    if (event.keyCode == 13){
        event.preventDefault();
    }
}, false);
    </script>
     <?php

//IMPORTA ARCHIVO DE CONEXION QUE CONTIENE LA CLASE DE CONEXION A MYSQL//
    require 'database/conexion_bd.php';
//CREAR EL OBJETO DE LA CLASE BD_PDO//
    $obj = new BD_PDO();
//REALIZAMOS UNA PETICION SQL AL SERVER A TRAVES DEL OBJETO//
    $tblusua = $obj->Ejecutar_Instruccion("SELECT * from usuarios ");

    if(isset($_POST['botoninsertar']))
    {
              
        $id_usua = $_POST['id_usua'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $privilegio = $_POST['privilegio'];
       
            $obj->Ejecutar_Instruccion("INSERT INTO `usuarios` (`correo`, `contrasena`, `privilegio`)  
            VALUES ('$correo','$contrasena','$privilegio');");
           
          header("location: registro.php");
          
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
                        <li><a href="index.php" class="scroll-top">Inicio</a></li>
                        <li><a href="conocenos.html">Conocenos</a></li>
                        <li><a href="contactanos.html">Contacto</a></li>
                        <li><a href="galeria.php" >Proyectos</a></li>
                        <li><a href="ideas.php">Ideas</a></li>
                        <li><a href="tuto.php">Tutoriales</a></li>
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
    </div>
    <section class="cd-hero">
        <div id="login">
                    <div class="container">
                        <div class="row">
                          <div id="form-login" class="col-md-6 col-md-offset-3">
                            <div class="section-heading">
                              <h4>Registro</h4>
                              <div class="line-dec"></div>
                              <br>
                              <br>
                            </div>
                            <form action="registro.php" method="post" id="formularioinsertar" name="formularioinsertar" enctype="multipart/form-data">                         
                              <div class="form-group">
                              <input type="text" id="id_usua" name="id_usua" hidden>     
                                <input type="text" class="form-login" placeholder="Correo de usuario" name="correo" id="correo" required>
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-login" placeholder="Contraseña" name="contrasena" id="contrasena" required>
                                <input type="text" class="form-login" placeholder="Contraseña" name="privilegio" id="privilegio" value="usuario" hidden>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <div class="text-content white-button">
                                    <a style="margin-right: 50%;" href="hacer registro" >Iniciar sesion</a>  
                                    <input type="submit" name="botoninsertar" class="btn btn-success" id="botoninsertar"  value="Registrarse">
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