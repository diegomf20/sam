<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../logica/operaciones.php';
     include '../sql/s-consultas.php';

     $sconsultas=new sconsultas();
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'consultaPagoInicial':
         try {
           $datos=$sconsultas->consultaPagoInicial();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

       case 'consultaInversionRenovacion':
          try {
            $datos=$sconsultas->consultaInversionRenovacion();
            echo json_encode($datos);
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          break;

        case 'consultaRetiros':
           try {
             $datos=$sconsultas->consultaRetiros();
             echo json_encode($datos);
           } catch (Exception $e) {
             echo $e->getMessage();
           }
           break;
        case 'consultaRetirosPagados':
            try {
              $datos=$sconsultas->consultaRetirosPagados();
              echo json_encode($datos);
            } catch (Exception $e) {
              echo $e->getMessage();
            }
            break;
         case 'consultaArbol':
            try {
              session_start();
              $inversionista=$_SESSION['inversionista'];
              $idinversionista=$inversionista['idinversionista'];
              $datos=$sconsultas->consultaArbol($idinversionista,1);
              echo json_encode($datos);
            } catch (Exception $e) {
              echo $e->getMessage();
            }
            break;
          case 'fechaPago':
            $operacion=new operaciones();
            echo $operacion->obtenerDiaFiltro();
            break;
     }
   }
