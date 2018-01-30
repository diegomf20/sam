<?php
  if (isset($_REQUEST['operacion'])) {
    include '../db.php';
    include '../sql/s-inversionista.php';
    include '../sql/s-afiliado.php';
    $sinversionista=new sinversionista();
    $operacion=$_REQUEST['operacion'];
    session_start();
    /**
     * Comprueba la existencia de la session
     */
    if (isset($_SESSION['inversionista'])) {
      $inversionista=$_SESSION['inversionista'];
      $idinversionista=$inversionista['idinversionista'];
    }
    switch ($operacion) {
      case 'login':
        $email=$_REQUEST['email'];
        $contrasenia=$_REQUEST['contrasenia'];
        try {
          $inversionista=$sinversionista->buscarClienteCorreoContrasenia($email,$contrasenia);
          $_SESSION['inversionista']=$inversionista;
          echo "correcto";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      case 'registrarInversionista':
        $inversionista=[];
        $nombres=$_REQUEST['nombres'];
        $apellidos=$_REQUEST['apellidos'];
        $dni=$_REQUEST['dni'];
        $celular=$_REQUEST['celular'];
        $email=$_REQUEST['email'];
        $imagen='usuario.jpg';
        $contrasenia='inversionista';
        try {
          $id=$sinversionista->registraInversionista($nombres,$apellidos,$dni,$celular,$email,$imagen,$contrasenia);
          $inversionista=$sinversionista->buscarClienteId($id);
          $_SESSION['inversionista']=$inversionista;
          echo "correcto";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;

      case 'registrarAfiliado':
        $inversionista=[];
        $nombres=$_REQUEST['nombres'];
        $apellidos=$_REQUEST['apellidos'];
        $dni=$_REQUEST['dni'];
        $celular=$_REQUEST['celular'];
        $email=$_REQUEST['email'];
        $imagen='usuario.jpg';
        $contrasenia='inversionista';
        try {
          $sinversionista->registrarAfiliado($idinversionista,$nombres,$apellidos,$dni,$celular,$email,$imagen,$contrasenia);
          echo "true";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      case 'listarInversionistas':
        $lista=$sinversionista->listarInversionistas();
        echo json_encode($lista);
        break;

      case 'cambiarContrasenia':
        try {
          $contrasenia=$_REQUEST['contrasenia'];
          $sinversionista->cambiarContrasenia($idinversionista,$contrasenia);
          $_SESSION['inversionista']=$sinversionista->buscarClienteId($idinversionista);
          echo "true";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
      case 'cambiarDatosPersonales':
        $nombres=$_REQUEST['nombres'];
        $apellidos=$_REQUEST['apellidos'];
        $dni=$_REQUEST['dni'];
        $celular=$_REQUEST['celular'];
        $direccion=$_REQUEST['direccion'];
        $ciudad=$_REQUEST['ciudad'];
        try {
          $sinversionista->cambiarDatosPersonales($idinversionista,$nombres,$apellidos,$dni,$celular,$direccion,$ciudad);
          $_SESSION['inversionista']=$sinversionista->buscarClienteId($idinversionista);
          echo "true";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      case 'cambiarInformacionBancaria':
        $banco=$_REQUEST['banco'];
        $numerocuenta=$_REQUEST['numerocuenta'];
        try {
          $sinversionista->cambiarInformacionBancaria($idinversionista,$banco,$numerocuenta);
          $_SESSION['inversionista']=$sinversionista->buscarClienteId($idinversionista);
          echo "true";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      default:

        break;
    }
  }
