<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cachito dealgodón</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <?php 
        require 'database/conexion_bd.php';
        $obj = new BD_PDO();
        $tbltutos = $obj->Ejecutar_Instruccion("SELECT * from tutoriales ");           
        //var_dump($tbladds);
        ?>
<body>
<style>
.product-container {
  margin: 5px;
  margin-top: 8px;
  position: relative;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
  background-color: rgba(0,0,0,0.5);
}
.page-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}
    </style>
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
                        <li><a href="index_sesion.php" >Inicio</a></li>
                        <li><a href="conocenos_sesion.php" >Conocenos</a></li>
                        <li><a href="contactanos_sesion.php" >Contacto</a></li>
                        <li><a href="galeria.php">Galeria</a></li>
                        <li><a href="ideas.php" >Ideas</a></li>
                        <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
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
        <div class="container">
            <div class="row">
                        <div class="thumb">
                            <div class="page-content ">
                                <?php foreach ($tbltutos as $row) { ?>
                                <div class="product-container searchable">
                                <h4 style="color: white; text-align: center; padding-top: 6px;"><?php echo $row ['nombre']; ?></h3><!--NOMBRE-->                        
                                    <img height="230px" width="270px" src="<?php echo $row ['imagen']; ?>" /><!--IMAGEN-->
                                    <br>
                                    <div class="text-content white-button" style="text-align: center; padding: 3px;">
                                <a href="<?php echo $row ['link_video']; ?>">Ir al tutorial</a>  
                                    </div>
                                </div>                             
                                <?php } ?>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <div id="contact" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
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
    </script>
</body>
</html>
