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
       case 'actualizarMontoPago':
         try {
           //rango de fecha actual
           $operacion=new operaciones();
           $fecha=$operacion->obtenerDiaFiltro();
           //obtiene a quienes se les va a pagar en esta fecha indicada
           $datos=$sconsultas->listarInversionistaCuota($fecha);
           
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

     }
   }
