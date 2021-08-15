<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="shortcut icon" href="logo-mywebsite-urian-viera.svg"/>

    <link href="css/material.min.css" rel="stylesheet">
    <title>Como-enviar-Correos-de-forma-Masiva-a-multiples-Usuarios-con-PHP-facil :: Urian Viera</title>


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

<nav class="navbar navbar-light" style="background-color: #55468c !important;">
  <a class="navbar-brand" href="#">
   <strong style="color: #fff">WebDeveloper</strong>
  </a>
</nav>

<div class="container mt-5"> 

  
  <h3 class="text-center mb-5" style="font-weight: 800; font-size: 35px">
    Cómo enviar Correos de forma Masiva a múltiples Clientes con PHP totalmente fácil
    <hr>
  </h3>

</div>

<br><br>
<?php
include('config.php');
  $QueryInmuebleDetalle = ("SELECT id_usuario, nombre, correo, notificacion FROM users WHERE correo !='' limit 50 ");
  $resultadoInmuebleDetalle = mysqli_query($con, $QueryInmuebleDetalle);
  $cantidad = mysqli_num_rows($resultadoInmuebleDetalle);
  ?>

<div class="album py-5 bg-light">
<form action="enviar_email.php" method="post">
<div class="container">
  <h4 style="border: 1px solid; padding: 15px;">Enviar Email de Forma Masiva <?php echo "(" .$cantidad.")"; ?>
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
                <th><input type="checkbox" onclick="marcar(this);"/></th>
                <th>Notificación</th>
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
                <td>
                <input type="checkbox"  name="correo[]" class="CheckedAK" correo="<?php echo $columnaInmuebleDetalle['correo']; ?>" value="<?php echo $columnaInmuebleDetalle['correo']; ?>"/>
                </td>
                <td><?php echo $columnaInmuebleDetalle['notificacion']; ?></td>
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
