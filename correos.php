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
			window.location = "correos.php?ideliminar=" + id;
		}
    
	}
    </script>
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
           
          header("location: correos.php");
          
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
                    <li style="margin-top: 15px;">
                    <form id="search-form" class="search-form">
                        <input type="text" id="search-input" placeholder="Buscar">
                        <button type="submit" id="search-button">Buscar</button>
                    </form>
                </li>
                        <li><a href="index_sesion.php">Inicio</a></li>
                        <li><a href="admin.html">Regresar</a></li>
                        <li><a href="cerrar_sesion.php" class="scroll-top">Cerrar sesion</a></li>
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
                          <div class="table-responsive-lg">                 
                            <table class="table table-striped"  id="myTable">
                            <thead>
                                <tr> 
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Mensaje</th>
                                    <th>Eliminar</th>
                                </tr>    
                            </thead>    
                                    <tbody>
                            <?php foreach ($tblcorreo as $row) { ?>
                                        <tr class="searchable">
                                        <td><?php echo $row[0]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[3]; ?></td>
                                        <td align="center">
                                        <input  type="button" name="botoneliminar" id="botonliminar" class="btn btn-danger" value="Eliminar" 
                                        onclick="javascript: eliminar('<?php echo $row[0]; ?>');">
                                        </td>
                                        </tr>
                                    <?php } ?> 
                            </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
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
    $(document).ready(function(){
    // Manejar el evento de entrada en el campo de búsqueda
    $("#search-input").on("input", function(){
        var textoBusqueda = $(this).val().toLowerCase(); // Obtener el texto de búsqueda y convertirlo a minúsculas
        // Recorrer todos los elementos relevantes en la página
        $(".searchable").each(function(){
            var elemento = $(this);
            var contenido = elemento.text().toLowerCase(); // Obtener el texto del elemento y convertirlo a minúsculas
            // Mostrar u ocultar el elemento según si coincide con la búsqueda
            if(contenido.includes(textoBusqueda)) {
                elemento.show();
            } else {
                elemento.hide();
            }
        });
    });

    // Evitar que el formulario se envíe
    $("#search-form").submit(function(e){
        e.preventDefault();
    });
});
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
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-MX.json'
            }
        });
    });
    </script>
</body>
</html>