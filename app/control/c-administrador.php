<?php
  if (isset($_REQUEST['operacion'])) {
    include '../db.php';
    include '../sql/s-administrador.php';
    $sadministrador=new sadministrador();
    $operacion=$_REQUEST['operacion'];
    switch ($operacion) {
      case 'login':
        $usuario=$_REQUEST['usuario'];
        $contrasenia=$_REQUEST['contrasenia'];
        try {
          $administrador=$sadministrador->buscarAdministradorUsuarioContrasenia($usuario,$contrasenia);
          session_start();
          $_SESSION['administrador']=$administrador;
          echo "true";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
    }
  }
