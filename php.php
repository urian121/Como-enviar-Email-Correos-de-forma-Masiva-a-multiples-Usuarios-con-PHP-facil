<?php
include('config.php');
if (isset($_POST['enviarform'])) {
    if (is_array($_POST['correo'])) {
        $num_countries = count($_POST['correo']);
        $row   = 1;
        $notif ="1";


        echo '<div>Has seleccionado: '. $num_countries .' Registros </div><hr><br>';

foreach ($_POST['correo'] as $key => $email) {

    $UpdateEmail = ("UPDATE clientes SET notificacion='" .$notif."'  WHERE correo='".$email."' ");
    $resultEmail = mysqli_query($con, $UpdateEmail);
if($resultEmail > 0){

    $destinatario = $email;
    $asunto       = utf8_decode("Cúpon")." de Descuento";
    $cuerpo = ' 
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        <tr>
            <td style="padding: 0">
                <img style="padding: 0; display: block" src="https://royalcanin48horas.com.co/Registro48Horas/images/banneremailv2.jpg" width="80%">
            </td>
        </tr>
        
        <tr>
            <td style="background-color: #ffffff;">
                <div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: sans-serif">
                    <h2 style="color: red; margin: 0 0 7px">Hola, '.$CriadorNombre.'</h2>
                    <p style="margin: 2px; font-size: 18px">te doy la Bienvenida a WebDeveloper, un canal de Desarrollo Web y Programación.
                </div>
            </td>
        </tr>
<p>&nbsp;</p>
        <tr>
            <td style="padding: 0;">
                <img style="padding: 0; display: block" src="https://royalcanin48horas.com.co/Registro48Horas/images/footeremail2.jpg" width="100%">
            </td>
        </tr>
    </table>
    '; 
    
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: Registro Royal Canin <noresponder@registroroyalcanin48horas.com.co>\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    $EnvioCriador    = mail($destinatario,$asunto,$cuerpo,$headers);

        }

        echo '<div>'. $row. "). " .$email.'</div>';
        $row ++;
    }
 }
}
?>



