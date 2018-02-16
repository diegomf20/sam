<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include 'db.php';
     include 'sql.php';
     include 'logica/operaciones.php';
     include 'sql/s-inversionista.php';
     $sql=new sql();
     //$db->prepare('SELECT * FROM partida WHERE apellido LIKE concat("%", :buscar, "%")');
    /**
     * seleccion de casos de operacion
     */
    $operacion=$_REQUEST['operacion'];
    switch ($operacion) {
      case 'registrar':
        $inversionista=[];
        $nombres=$_REQUEST['nombres'];
        $apellidos=$_REQUEST['apellidos'];
        $dni=$_REQUEST['dni'];
        $celular=$_REQUEST['celular'];
        $email=$_REQUEST['email'];
        $imagen='usuario.jpg';
        $contrasenia='inversionista';
        try {
          $id=$sql->registraInversionista($nombres,$apellidos,$dni,$celular,$email,$imagen,$contrasenia);
          $inversionista=$sql->buscarClienteId($id);
          session_start();
          $_SESSION['inversionista']=$inversionista;
          echo "correcto";
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;

      case 'ingresar':
        $email=$_REQUEST['email'];
        $contrasenia=$_REQUEST['contrasenia'];
        $inversionista=$sql->buscarClienteCorreoContrasenia($email,$contrasenia);
        session_start();
        $_SESSION['inversionista']=$inversionista;
        echo "correcto";
        break;

      case 'resumenes':
        session_start();
        $inversionista=$_SESSION['inversionista'];
        $idinversionista=(int) $inversionista['idinversionista'];
        if ($sql->consultaExisteciaInversion($idinversionista)==0) {
          $resultados=["paquete"=>0,"cuota"=>0,"personas"=>0];
        }else{
          $resultados=$sql->obtenerResumenes($idinversionista);
          $sinversionista=new sinversionista();
          $inversionista=$sinversionista->buscarClienteId($idinversionista);
          $_SESSION['inversionista']=$inversionista;
          $resultados['cuota']=$inversionista['cuotaretirada'];
          $resultados['personas']=$inversionista['numeroafiliados'];
        }
        echo json_encode($resultados);
        break;

      case 'insertarInversion':
        $sql->insertarInversion(58,200,1);
        echo "realizado";
        break;

      default:
        # code...
        break;
    }


  }
