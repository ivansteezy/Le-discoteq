<?php
//Librerías para el envío de mail
//include_once('class.phpmailer.php');
//include_once('class.smtp.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; 
 
 session_start();
//Este bloque es importante
$mail = new PHPMailer(true);

try{
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	 
	//Nuestra cuenta
	$mail->Username ="LeDiscotecRecords@gmail.com";
	$mail->Password = "LeDiscotec123"; //Su password
	//$mail->isHTML(true);
	 
	//Agregar destinatario
	$mail->SetFrom('LeDiscotecRecords@gmail.com');
	$mail->AddAddress($_SESSION['Correo_U']);
	$mail->Subject = 'Gracias Por Su Compra';
	$mail->Body = 'Gracias por comprar con nosostros ' . $_SESSION['Nombre_U'] . '   Por cualquier duda contactenos a este correo.';
	
	$mail->AddAttachment('PDF/Compra.pdf', 'Compra.pdf');

	$mail->send();
	echo $mail->ErrorInfo;
	header("location: End.php");


} catch(Exception $e)
{
	echo "ERROR <br>";
	echo $mail->ErrorInfo;
}


//Para adjuntar archivo

//$mail->MsgHTML($mensaje);
 
//Avisar si fue enviado o no y dirigir al index
/*if($mail->Send())
{
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
}*/
?>