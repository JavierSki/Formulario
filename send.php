<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;

	$to='javier-0517@hotmail.com';//Correo de contacto

	//Recolectar los datos del formulario
	$nombre=$_POST['name'];
	$email=$_POST['email'];
	$asunto=$_POST['asunto'];
	$mensaje=nl2br($_POST['mensaje']);

	// echo $nombre.' - '.$email.'<br>'.$asunto.'<br>'.$mensaje
	if($nombre=="" || $email=="" || $asunto=="" || $mensaje==""){
		echo '<div class="alert alert-danger">Todos los campos son requiridos</div>';
	}else{
		$mail->From = $email;
		$mail->FromName = $nombre;
		$mail->addAddress($to);
		$mail->Subject = $asunto;
		$mail->isHtml(true);
		$mail->Body = '<strong>'.$nombre.'</strong>'.' Le ha contactado desde su Web y le ha enviado el siguiente mensaje: <br><p>'.$mensaje.'</p>';
		$mail->CharSet = 'UTF-8';
		$mail->send();

		if(!$mail){
			echo 'El mensaje no pudo ser Enviado';
			echo 'Mailer Error: '.$mail->ErrorInfo;
			echo '<script>$(#fcontacto).reset();</script>';
		}
	}
?>