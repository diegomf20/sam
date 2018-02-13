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
    $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->Port = 587;
    $mail->SMTPOptions = array ('ssl' => array('verify_peer'  => false,'verify_peer_name'  => false,'allow_self_signed' => true));
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = "diegomf.mendoza@gmail.com";
    $mail->Password = "stunsd18";
    $mail->setFrom($email,$nombres);
    $mail->AddAddress($email);
    $mail->Subject='SAM - SOCIEDAD DE AYUDA MUTUA';
    $mail->isHTML(true);
    $mail->Body=$html;
    if ($mail->Send()) {
      return "true";
    }else{
      return "No se pudo enviar".$mail->ErrorInfo;
    }

  }
}
