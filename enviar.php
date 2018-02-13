<?php

	require_once 'phpmailer/PHPMailerAutoload.php';

	$nombre=$_REQUEST['nombre'];
	$telefono=$_REQUEST['telefono'];
	$email=$_REQUEST['email'];
	$mensaje=$_REQUEST['mensaje'];


	$mail=new phpmailer();
	if ($mail->validateAddress($email)) {
		$mail->isSMTP();
    $mail->Host = gethostbyname('mail.ciwsam.com');
    $mail->Port = 2525;
    $mail->SMTPOptions = array ('ssl' => array('verify_peer'  => false,'verify_peer_name'  => false,'allow_self_signed' => true));
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = "admin@ciwsam.com";
    $mail->Password = "@emailsam";
    $mail->setFrom("admin@ciwsam.com","SAM");
    $mail->AddAddress($email);
    $mail->Subject='SAM - SOCIEDAD DE AYUDA MUTUA';
    $mail->isHTML(true);
		$mensajehtml="";
		$mensajehtml=$mensajehtml.'<label>Nombre: </label>'.$nombre.'<br>';
		$mensajehtml=$mensajehtml.'<label>Telefono: </label>'.$telefono.'<br>';
		$mensajehtml=$mensajehtml.'<label>Email: </label>'.$email.'<br>';
		$mensajehtml=$mensajehtml.'<label>Contenido: </label><br>';
		$mensajehtml=$mensajehtml.'<p>'.$mensaje.'</p>';

		$mail->Body=$mensajehtml;
		if ($mail->Send()) {
			echo "Mensaje Enviado";
		}else{
			echo "No se pudo enviar".$mail->ErrorInfo;
		}

	}else{
		echo 'Ingrese un correo correcto';
	}
