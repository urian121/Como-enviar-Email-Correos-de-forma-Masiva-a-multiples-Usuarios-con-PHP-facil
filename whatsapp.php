
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Permutasalcuadrado</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Documentation extras -->
    <link href="https://getbootstrap.com/docs/4.4/assets/css/docs.min.css" rel="stylesheet">

<!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="https://getbootstrap.com/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">

<script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">

$(document).click(function() { //Creamos la Funcion del Click
  var checked = $(".CheckedAK:checked").length; //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
  $("p").text("Tienes Actualmente " + checked + " Registros " + "Seleccionado(s)"); //Asignamos a la Etiqueta <p> el texto de cuantos Checkbox ahi Seleccionados(Combinando la Variable)

  if (checked == 0) {
      $('#enviarform').hide(); //ocultar
      console.log('debe seleccionar un Registro')
  }else{
    $("#enviarform").fadeIn("slow"); //mostrar
     console.log(checked);
  }
})
.trigger("click"); //Simulamos el Evento Click(Desde el Principio, para que muestre cuantos ahi Seleccionados)


function marcar(source)
{
    checkboxes = document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}
</script>
  </head>
  <body>
    <a class="skippy sr-only sr-only-focusable" href="#content">
  <span class="skippy-text">Menu</span>
</a>

<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="index.php" aria-label="Bootstrap"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="d-block" viewBox="0 0 612 612" role="img" focusable="false"><title>Bootstrap</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"/><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"/></svg></a>

  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
      <li class="nav-item">
        <a class="nav-link " href="index.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="whatsapp.php">Whatsapp</a>
      </li>
    </ul>
  </div>
</header>
<br><br>
<?php
include('config.php');
  $QueryInmuebleDetalle = ("SELECT * FROM usuario WHERE correo ='' ");
  $resultadoInmuebleDetalle = mysqli_query($con, $QueryInmuebleDetalle);
  $cantidad = mysqli_num_rows($resultadoInmuebleDetalle);
  ?>

<div class="album py-5 bg-light">
<form action="enviar_email.php" method="post">
<div class="container">
  <h4 style="border: 1px solid; padding: 15px;">Clientes sin Email <?php echo "(" .$cantidad.")"; ?>
     <input type="submit" style="float: right; display: none;" name="enviarform" id="enviarform" class="btn btn-round btn-primary right" value="Enviar Emails..">
  </h4>

  <!--Mostrando Registros Seleccionados-->
  <p style="color: green; text-align: center;"></p>

<table class="table  table-bordered">
        <thead>
           <tr>
              <th>#</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Telefono</th>
                <th><input type="checkbox" onclick="marcar(this);"/></th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          while ($columnaInmuebleDetalle = mysqli_fetch_array($resultadoInmuebleDetalle)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $columnaInmuebleDetalle['id_usuario']; ?></td>
                <td><?php echo $columnaInmuebleDetalle['nombre']; ?></td>
                <td><?php echo $columnaInmuebleDetalle['correo']; ?></td>
                <td><?php echo $columnaInmuebleDetalle['celular']; ?></td>
                <td><?php echo $columnaInmuebleDetalle['telefono']; ?></td>
                <td>
                <input type="checkbox"  name="correo[]" class="CheckedAK" correo="<?php echo $columnaInmuebleDetalle['correo']; ?>" value="<?php echo $columnaInmuebleDetalle['correo']; ?>"/>
                </td>
                <td>
                  <a href="#">
                    <img src="whatsapp.png" alt="" style="width: 35px;">
                  </a>
                </td>
            </tr>
          <?php $i++; } ?>
        </tbody>
    </table>
</div>
</form>
</div>



  <footer class="bd-footer text-muted">
  <div class="container-fluid p-3 p-md-5">
    <span>Web-Developer Urian Viera <a href="http://mywebsite.rf.gd">MyWebsite</a></span>
  </div>
</footer>

  </body>
</html>
