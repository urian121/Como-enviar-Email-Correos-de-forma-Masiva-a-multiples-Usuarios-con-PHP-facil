<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="icon" type="image/png" href="imgs/logo-mywebsite-urian-viera.svg">

    <link rel="stylesheet" type="text/css" href="css/material.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Como enviar Correos de forma Masiva a multiples Usuarios con PHP fácil :: Urian Viera</title>
  </head>
  <body>

<nav class="navbar navbar-light" style="background-color: #55468c !important;">
  <a class="navbar-brand" href="#">
   <strong style="color: #fff">WebDeveloper</strong>
  </a>
</nav>

<div class="container mt-5"> 

  
  <h3 class="text-center mb-5" style="font-weight: 800; font-size: 35px">
    Cómo enviar Correos (Email) de forma Masiva a múltiples Clientes con PHP totalmente fácil
    <hr>
  </h3>



<?php
include('config.php');
  $QueryInmuebleDetalle = ("SELECT * FROM clients WHERE correo !='' limit 50 ");
  $resultadoInmuebleDetalle = mysqli_query($con, $QueryInmuebleDetalle);
  $cantidad = mysqli_num_rows($resultadoInmuebleDetalle);
?>


<form action="enviarEmail.php" method="post">

  <div class="row mb-5">
    <div class="col-4">
      <input type="checkbox" onclick="marcarCheckbox(this);"/>
      <label id="marcas">Marcar todos</label>
    </div>
    <div class="col-4">
       <p id="resp"></p>
    </div>
     <div class="col-4">
      <input type="submit" style="display: none;" name="enviarform" id="enviarform" class="btn btn-round btn-primary btn-block" value="Enviar Emails">
    </div>
  </div>


  <div class="table-responsive mb-5">
  <table class="table  table-hover table-bordered">
         <thead class="thead-dark">
           <tr>
                <th> # </th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Estatus de Notificación</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          while ($dataClientes = mysqli_fetch_array($resultadoInmuebleDetalle)) { ?>
            <tr>
                <td>
                  <?php echo $i; ?>
                    <input type="checkbox"  name="correo[]" class="CheckedAK" correo="<?php echo $dataClientes['correo']; ?>" value="<?php echo $dataClientes['correo']; ?>"/>
                  </td>
                <td><?php echo $dataClientes['cliente']; ?></td>
                <td><?php echo $dataClientes['correo']; ?></td>
                <td>
                  <?php
                  echo ($dataClientes['notificacion']) ? '<i class="zmdi zmdi-check-all zmdi-hc-2x green"></i>' : '<i class="zmdi zmdi-check zmdi-hc-2x black"></i>';
                  ?>
                </td>
            </tr>
          <?php $i++; } ?>
        </tbody>
    </table>
  </div>
</div>
</form>

</div>


<script  src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="js/script.js"></script>

  </body>
</html>
