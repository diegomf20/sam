<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */


     include '../db.php';
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
     }
   }
