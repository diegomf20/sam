<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../logica/operaciones.php';
     include '../sql/s-consultas.php';
     include '../sql/s-actualizar.php';
     include '../sql/s-inversion.php';

     $sconsultas=new sconsultas();
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {

       //ADMINISTRADOR
       //consulta a todos los usuarios para su posterior pago de sus inscripcion
       case 'consultaPagoInicial':
         try {
           $datos=$sconsultas->consultaInversion();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;
       //consulta a todos los usuarios para su posterior pago de sus inscripcion
       case 'consultaInversionInicial':
         try {
           $datos=$sconsultas->consultaInversionInicial();
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
            $sactualizar=new sactualizar();
            echo $operacion->obtenerDiaFiltro().'/'.$sactualizar->confirmarActualizar($operacion->obtenerDiaFiltro());

            break;
          case 'consultaPendientes':
             try {
               session_start();
               $inversionista=$_SESSION['inversionista'];
               $idinversionista=$inversionista['idinversionista'];
               $datos=$sconsultas->consultaPendientes($idinversionista);
               echo json_encode($datos);
             } catch (Exception $e) {
               echo $e->getMessage();
             }
             break;
     }
   }
