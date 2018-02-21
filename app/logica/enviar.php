<?php
class enviar
{
  function comprobar($email){
    $mail=new phpmailer();
    if ($mail->validateAddress($email)) {
      return true;
    }else {
      return false;
    }
  }
  function gmail ($html,$email,$nombres)
  {
    $mail=new phpmailer();
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
    $mail->AddAddress('admin@ciwsam.com');
    $mail->addAttachment('SAM.pdf');
    $mail->Subject='SAM - SOCIEDAD DE AYUDA MUTUA';
    $mail->isHTML(true);
    $mail->CharSet='UTF-8';
    $mail->Body=$html;
    if ($mail->Send()) {
      return "true";
    }else{
      return "No se pudo enviar".$mail->ErrorInfo;
    }
  }
}
