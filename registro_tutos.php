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
<script type="text/javascript">
      function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales)
       {
            if(key == especiales[i])
            {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial)
        { 
          alert ("Favor de ingresar solo letras")
            return false;
        }
    }
      function validarExt()
   {
    var imagen = document.getElementById('imagen');
    var archivoRuta = imagen.value;
    var extPermitidas =/(.jpg|.jpeg|.png|.gif)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado una imagen');
        imagen.value = '';
        return false;
    }
   }
    </script>
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
    $tbltutos = $obj->Ejecutar_Instruccion("SELECT * from tutoriales ");

    if(isset($_POST['botoninsertar']))
    {
            
            $id_tutorial = $_POST['id_tutorial'];
            $nombre = $_POST['nombre'];
            $link = $_POST['link_video'];
            $imagen_actual = $_POST['imagen_actual'];
            $nombre_archivo = basename($_FILES['imagen']['name']);
            $dir_subida = 'img/';
            $fichero_subido = $dir_subida . $nombre_archivo;

        if($_POST['botoninsertar']=='Modificar')
        {
            $id_tutorial = $_POST['id_tutorial'];
            $nombre = $_POST['nombre'];
            $link = $_POST['link_video'];
             // Obtener el nombre del archivo de imagen
             $nombre_archivo = basename($_FILES['imagen']['name']);
             $dir_subida = 'img/';
             $fichero_subido = $dir_subida . $nombre_archivo;
             if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                 move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
             }
             else {
                 // Si no se proporciona una nueva imagen, conserva la imagen actual
                 $fichero_subido = $imagen_actual;
             }        

        $obj->Ejecutar_Instruccion("UPDATE `tutoriales` SET `nombre` = '$nombre', `imagen` = '$fichero_subido',`link_video` = '$link' WHERE id_tutorial = '$id_tutorial';");
            
        header("location: registro_tutos.php");
        }
        else if ( $_POST['botoninsertar']=='Insertar') 
        {
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
            }
            else {
                // Si no se proporciona una imagen, puedes mostrar una imagen de relleno
                $fichero_subido = 'img/cotton.png';
            }
            $obj->Ejecutar_Instruccion("INSERT INTO `tutoriales` (`nombre`, `imagen`, `link_video`)  
            VALUES ('$nombre','$fichero_subido','$link');");
           
          header("location: registro_tutos.php");
          
        }
    }
    else if(isset($_GET['ideliminar']))
    {
        $eliminar = $_GET['ideliminar'];
        $obj->Ejecutar_Instruccion("DELETE FROM tutoriales WHERE id_tutorial='$eliminar'");
        header("location: registro_tutos.php"); 
        
    }
    elseif (isset($_GET['id_tutorial'])) 
    {		
                $idmodificar = $_GET['id_tutorial'];
                $tutomod = $obj->Ejecutar_Instruccion("SELECT * FROM tutoriales WHERE id_tutorial = '$idmodificar'");
    }
    
    
    if(isset($_POST['botonbuscar']))
    {
        $buscar = $_POST['idbuscar'];
        $result = $obj->Ejecutar_Instruccion("Select * from tutoriales where nombre like '%$buscar%'");
        
    }
    else
    {
        $result=$obj->Ejecutar_Instruccion("Select * from tutoriales");
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
                            <div class="section-heading">
                              <h4>Registro Tutoriales</h4>
                              <div class="line-dec"></div>
                              <br>
                              <br>
                            </div>
                            <form action="registro_tutos.php" method="post" id="formularioinsertar" name="formularioinsertar" enctype="multipart/form-data">                         
                              <div class="form-group">
                                <input type="text" id="id_tutorial" onkeypress="return soloLetras(event)" name="id_tutorial" value="<?php echo @$tutomod[0][0]; ?>"  hidden>     
                                <input type="text" name="nombre" id="nombre" value="<?php echo @$tutomod[0][1]; ?>" class="form-login" placeholder="Titulo" required>
                              </div>
                                  
                              <div class="form-group" align="center">
                                <input type="file" class="btn" onchange="return validarExt()" name="imagen" id="imagen" placeholder="Selecciona imagen">
                                <input type="hidden" name="imagen_actual" value="<?php echo @$tutomod[0][2]; ?>"  ><br>
                                <img src="<?php echo (isset($tutomod) ? @$tutomod[0][2] : "img/cotton.png"); ?>"  height="100px" width="100px" >					
			                 </div>

                              <div class="form-group">
                                <input type="text" name="link_video"  id="link_video" value="<?php echo @$tutomod[0][3]; ?>" class="form-login" placeholder="Link video" required>
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <div class="text-content white-button " style="text-align: center;">
                                  <input type="submit" name="botoninsertar" class="btn btn-success" id="botoninsertar"  value="<?php echo isset($_GET['id_tutorial']) ? 'Modificar' : 'Insertar'; ?>">
                                  </div>                            
                                </fieldset>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
    <div class="table-responsive-lg">                 
    <table class="table table-hover table-bordered" id="myTable">
    <thead>
        <tr> 
            <th>ID</th>
            <th>Nombre</th>
            <th>imagen</th>
            <th>Link video</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>    
    </thead>    
            <tbody>
    <?php foreach ($result as $row) { ?>
                <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td  align="center"><img height="100px" width="100px" src="<?php echo $row [2];?>" ></td>
                <td><?php echo $row[3]; ?></td>
                <td align="center">
                <input  type="button" name="botoneliminar" id="botonliminar" class="btn btn-danger" value="Eliminar" 
                onclick="javascript: eliminar('<?php echo $row[0]; ?>');">
                </td>
                <td align="center">
                <input type="button" name="botonmodificar" id="botonmodificar" class="btn btn-info" value="Modificar" 
                onclick="javascript: modificar('<?php echo $row[0]; ?>');">
                </td>
                </tr>
               <?php } ?> 
    </tbody>
    </table>
    </div>
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