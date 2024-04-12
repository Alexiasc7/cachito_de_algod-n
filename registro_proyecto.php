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
			window.location = "registro_proyecto.php?ideliminar=" + id;
		}
    
	}

  function modificar(id)
	{
        if (confirm("¿ Estas seguro de modificar el registro ?")) {
            window.location = "registro_proyecto.php?id_patron=" + id; 
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
    $tblpatrones = $obj->Ejecutar_Instruccion("SELECT * from patrones ");
    $tblcat = $obj->Ejecutar_Instruccion("SELECT * from categorias");

    if(isset($_POST['botoninsertar']))
    {
            
            $id_patron = $_POST['id_patron'];
            $nombre = $_POST['nombre_patron'];
            $imagen_actual = $_POST['imagen_actual'];
            $nombre_archivo = basename($_FILES['imagen']['name']);
            $dir_subida = 'img/';
            $fichero_subido = $dir_subida . $nombre_archivo;
            $link_drive = $_POST['link_drive'];
            $cat = $_POST['cat'];

        if($_POST['botoninsertar']=='Modificar')
        {
            $id_patron = $_POST['id_patron'];
            $nombre = $_POST['nombre_patron'];
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
            $link_drive = $_POST['link_drive'];
            $cat = $_POST['cat'];   

        $obj->Ejecutar_Instruccion("UPDATE `patrones` SET `nombre_patron` = '$nombre', `imagen` = '$fichero_subido', `link_drive` = '$link_drive', `cat` = '$cat' WHERE id_patron = '$id_patron';");
            
        header("location: registro_proyecto.php");
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
            $obj->Ejecutar_Instruccion("INSERT INTO `patrones` (`nombre_patron`, `imagen`, `link_drive`, `cat`)  
            VALUES ('$nombre','$fichero_subido','$link_drive', '$cat');");
           
          header("location: registro_proyecto.php");
          
        }
    }
    else if(isset($_GET['ideliminar']))
    {
        $eliminar = $_GET['ideliminar'];
        $obj->Ejecutar_Instruccion("DELETE FROM patrones WHERE id_patron='$eliminar'");
        header("location: registro_proyecto.php"); 
        
    }
    elseif (isset($_GET['id_patron'])) 
    {		
                $idmodificar = $_GET['id_patron'];
                $pat_mod = $obj->Ejecutar_Instruccion("SELECT * FROM patrones WHERE id_patron = '$idmodificar'");
    }
    
    
    if(isset($_POST['botonbuscar']))
    {
        $buscar = $_POST['idbuscar'];
        $result = $obj->Ejecutar_Instruccion("Select * from patrones where nombre like '%$buscar%'");
        
    }
    else
    {
        $result=$obj->Ejecutar_Instruccion("Select * from patrones");
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
                    <div class="container ">
                        <div class="row ">
                          <div id="form-login" class="col-md-6 col-md-offset-3 ">
                            <div class="section-heading">
                              <h4>Registro Proyectos</h4>
                              <div class="line-dec"></div>
                              <br>
                              <br>
                            </div>
                            <form class="searchable" action="registro_proyecto.php" method="post" id="formularioinsertar" name="formularioinsertar" enctype="multipart/form-data">                            
                                <div class="form-group">
                            <input type="text" id="id_patron" name="id_patron" value="<?php echo @$pat_mod[0][0]; ?>"  hidden>   
                            <div class="form-group">
                                <input name="nombre_patron" id="nombre_patron" onkeypress="return soloLetras(event)" value="<?php echo @$pat_mod[0][1]; ?>"  type="text" class="form-login" placeholder="Titulo" required>
                              </div>
                              <div class="form-group" align="center">
                                <input type="file" class="btn" onchange="return validarExt()" name="imagen" id="imagen" placeholder="Selecciona imagen">
                                <input type="hidden" name="imagen_actual" value="<?php echo @$pat_mod[0][2]; ?>"  ><br>
                                <img src="<?php echo (isset($pat_mod) ? @$pat_mod[0][2] : "img/cotton.png"); ?>"  height="100px" width="100px" >					
			                 </div>
                              <div class="form-group">
                                <input name="link_drive" id="link_drive" value="<?php echo @$pat_mod[0][3]; ?>" type="text" class="form-login" placeholder="Link drive"  required>
                              </div>
                              <div class="form-group">
                              <select class="form-login" id="cat" class="email-bt" name="cat" placeholder="Selecciona categoria" required>
                                <option disabled selected>Categoria</option>
                                <?php foreach ($tblcat as $renglon) {
                                $selected_cat = ($renglon[1] == @$pat_mod[0][4]) ? 'selected' : '';
                                echo "<option value=\"$renglon[1]\" $selected_cat>{$renglon['nombre_cat']}</option>";
                                }?>
                            </select>
                                
                              </div>
                              <div class="col-md-12">
                                <fieldset>
                                  <div class="text-content white-button " style="text-align: center;">
                                  <input type="submit" name="botoninsertar" class="btn btn-success" id="botoninsertar"  value="<?php echo isset($_GET['id_patron']) ? 'Modificar' : 'Insertar'; ?>">
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
    <table class="table table-striped" id="myTable">
    <thead>
        <tr> 
            <th>ID</th>
            <th>Nombre</th>
            <th>imagen</th>
            <th>link</th>
            <th>categoria</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>    
    </thead>    
            <tbody>
    <?php foreach ($result as $row) { ?>
                <tr class="searchable">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td  align="center"><img height="100px" width="100px" src="<?php echo $row [2];?>" ></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
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