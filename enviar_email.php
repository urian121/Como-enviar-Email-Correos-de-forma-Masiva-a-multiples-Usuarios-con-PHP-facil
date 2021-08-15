<?php
include('config.php');
if (isset($_POST['enviarform'])) {
    if (is_array($_POST['correo'])) {
        $num_countries = count($_POST['correo']);
        $row = 1;
        $notif ="Enviada";
        echo '<div>Has seleccionado: '. $num_countries .' Registros </div><hr><br>';
        foreach ($_POST['correo'] as $key => $email) {

        $UpdateEmail = ("UPDATE usuario SET notificacion='" .$notif."'  WHERE correo='".$email."' ");
        $resultEmail = mysqli_query($con, $UpdateEmail);
        if($resultEmail > 0){

//ENVIANDO INFORMACION AL EMAIL DEL CLIENTE
    $paraCliente    = $email;
    $tituloCliente  = "Permuta desde la Comodida de tu Casa";
    $mensajeCliente = "<html>".
    "<head><title>Email desde Permutasalcuadrado</title>".
    "<style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Nunito', sans-serif;
    color: #333;
    font-size: 14px;
    background:#222;
}
.contenedor{
    width: 80%;
    min-height:auto;
    text-align: center;
    margin: 0 auto;
    padding: 40px;
    background: #ececec;
    border-top: 3px solid #E64A19;
    }
    .hola{
    color:#333;
    font-size:25px;
    font-weight:bold;
    }
    img{
    margin-left: auto;
    margin-right: auto;
    display: block;
    padding:0px 0px 20px 0px;
   }
   .link{
    text-decoration: none;
    margin: 0 auto;
    border: 0;
    outline: none;
    border-radius: 0;
    padding: 12px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: .1em;
    background-color: #ff7542;
    border-color: #c63411;
    color: #cccccc !important;
    font-weight: bold;
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    -webkit-appearance: none;
  }
  .link:hover {
  text-decoration: none;
  cursor:pointer;
  color: #cccccc !important;
  opacity: 0.8;
}
</style>
</head>".
    "<body>" .
        "<div class='contenedor'>".
                "<p>&nbsp;</p>" .
                "<p><span style='color:#E64A19; font-weight:bold;'>S</span>abemos la importancia de atender las medidas de proteción para ti y tu familia, por eso encuentras en nosotros el mejor aliado, para vender o permutar tu inmueble desde la comodida de tu casa.</p> " .
                "<p>&nbsp;</p>" .
                "<p>No dejes de publicar con nosotros.</p> " .
                "<p>&nbsp;</p>" .
                "<p>&nbsp;</p>" .
        "<p>Permutasalcuadrado se asegurará que su Inmueble sea publicado en el menor tiempo posible.</p>" .
        "<p>&nbsp;</p>" .
        "<p>Recuerda, si deseas desactivar algun inmueble de tu propiedad que este publicado en nuestro Portal Web, nos puedes escribir o llamar al Whatsapp 350 508 7172 ,si deseas algun tipo de ayuda no dudes en escribirnos. </p>" .
        "<p>&nbsp;</p>" .
        "<p>¡Gracias por preferirnos!</p>" .
        "<p>&nbsp;</p>" .
        "<p>&nbsp;</p>" .
        "<p><a title='Permutasalcuadrado.com' href='https://www.permutasalcuadrado.com/' target='_blank'><img src='https://www.permutasalcuadrado.com/images/logot.png' alt='' width='100px' /></p>" .
        "<p>&nbsp;</p>" .
        "<p><a href='https://www.permutasalcuadrado.com/' style='color: #cccccc !important;' class='link' target='_blank'>Visitar Portal Web</a></p>" .
        "<p>&nbsp;</p>" .
    "</div>" .
    "</body>" .
"</html>";

$cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
$cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabecerasCliente .= 'From: Bogota Colombia<info@permutasalcuadrado.com>';
$enviadoCliente   = mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);

        }

        echo '<div>'. $row. "). " .$email.'</div>';
        $row ++;
    }
}
}
?>



