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
    <?php 

         require 'database/conexion_bd.php';
         $obj = new BD_PDO();

         $tblinicio = $obj->Ejecutar_Instruccion("Select * from imagenes_inicio ");
         $tbladds = $obj->Ejecutar_Instruccion("Select * from anuncios ");

           

           //var_dump($tbladds);
       ?>
<body>
    <style>
        .product-container {
  margin: 5px;
  margin-top: 8px;
  padding: 2px 4px 4px;
  position: relative;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
  background-color: white;
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
                        <li><a href="index.php" class="scroll-top">Inicio</a></li>
                        <li><a href="conocenos.html">Conocenos</a></li>
                        <li><a href="contactanos.html">Contacto</a></li>
                        <li><a href="#" onclick="alert('Inicia sesion para acceder al contenido')">Proyectos</a></li>
                        <li><a href="#" onclick="alert('Inicia sesion para acceder al contenido')">Ideas</a></li>
                        <li><a href="#" onclick="alert('Inicia sesion para acceder al contenido')">Tutoriales</a></li>
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


    <section class="cd-hero">
        <ul class="cd-hero-slider autoplay">  
        <!-- 
            <ul class="cd-hero-slider autoplay"> for slider auto play 
            <ul class="cd-hero-slider"> for disabled auto play
        -->
            <li class="selected first-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span></span>
                        <h2>Inicia sesion</h2>
                        <div class="primary-button">
                            <h3>Al registrarte o iniciar sesion <br> puedes acceder a todo el contenido</h3>
                            <a href="login.php" data-id="about">Iniciar sesion </a>
                            
                        </div>                           
                    </div>                   
                </div> <!-- .cd-full-width -->
            </li>

            <li class="second-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span></span>
                        <h2>Se creativo</h2>
                        <div class="primary-button">
                            <h3>Expande tu creatividad y has tus propias creaciones <br> con ayuda de tutoriales</h3>
                            <a href="#" onclick="alert('Inicia sesion para acceder al contenido')">Tutoriales</a>
                        </div>                        
                    </div>                     
                </div> <!-- .cd-full-width -->
            </li>

            <li class="third-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span></span>
                        <h2>Hazlo tu mismo</h2>
                        <div class="primary-button">
                            <h3>Empieza de lo mas sencillo a lo más avanzado con ayuda de <br> patrones sencillos</h3>
                            <a href="#" onclick="alert('Inicia sesion para acceder al contenido')">Patrones</a>
                        </div>                           
                    </div>                         
                </div> <!-- .cd-full-width -->
            </li>
        </ul> <!-- .cd-hero-slider -->

        <div class="cd-slider-nav">
            <nav>
                <span class="cd-marker item-1"></span>
                
                <ul>
                    <li class="selected"><a href="#0"></a></li>
                    <li><a href="#0"></a></li>
                    <li><a href="#0"></a></li>                        
                </ul>
            </nav> 
        </div> <!-- .cd-slider-nav -->
    </section> <!-- .cd-hero -->

    <div id="about" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>Descubre</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>Personaliza proyectos </h4>
                        <p>Aprender a crear patrones propios a base de otros y dandoles tu toque personal</p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Descubre nuevas cosas</h4>
                        <p>Pasa por la galeria de proyectos y descubre y aprende como hacer cada uno.</p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Ponte en contacto</h4>
                        <p>Si tienes dudas sobre la pagina o proyectos y quieres atencion personal, contactanos!!.</p>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>Realizalo paso a paso</h4>
                        <p>Observa los videos para realizar cada proyecto, o usa los patrones si ya eres un experto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="portfolio" class="page-section">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h4>Nuevos agregados</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
                <br>
                    <div class="projects-holder">
                        <div class="row">
                        <div class="page-content">
                        <?php foreach ($tblinicio as $row) { ?>
                        <div class="product-container">
                            <img height="230px" width="270px" src="<?php echo $row ['imagen']; ?>" /><!--IMAGEN-->
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div> 
    </div>
    <div id="portfolio" class="page-section">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h4>Anuncios</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="projects-holder">
                        <div class="row">
                        <div class="page-content">
                        <?php foreach ($tbladds as $row) { ?>
                        <div class="product-container">
                        <h4><?php echo $row ['titulo']; ?></h3><!--NOMBRE-->
                            <img height="230px" width="270px" src="<?php echo $row ['imagen']; ?>" /><!--IMAGEN-->
                        </div>
                        <?php } ?>
                        </div>
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