<?php
  //if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../logica/operaciones.php';
     include '../sql/s-consultas.php';
/*
     $sconsultas=new sconsultas();
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'actualizarMontoPago':*/
         try {
           //rango de fecha actual
           $operacion=new operaciones();
           $fecha=$operacion->obtenerDiaFiltro();
           $fechaAnterior=$operacion->obtenerDiaFiltroAnterior();
           //obtiene a quienes se les va a pagar en esta fecha indicada
           $lista=$sconsultas->listarInversionistaCuota($fecha);
           for ($i=0; $i < count($inversionistacuota); $i++) {
             //lee una fila de todo el arreglo bidimensional
             $fila=$lista[$i];
             $descripcion='Cuota N° '.$fila['cuota'].' ';
             $monto=$fila['paquete']*0.2;
             //obtiene una lista de paquetes y el nivel en q estan
             $paquetenivel=$sconsultas->obtenerPaquetePago($fila['idinversionista'],$fechaAnterior,$fecha);
             //se obtiene el monto de la comision por inversionista
             if (count($paquetenivel)>0) {
               $descripcion+='comision por afiliado';
               $monto+=$operaciones->obtenerComision($paquetenivel,$fila['rango']);
             }
             //se agregan dos columnas ... un monto y su decripcion de dicho monto
             $lista[$i]['monto']=$monto;
             $lista[$i]['descripcion']=$descripcion;
           }
           //se actualizan todos los montos en paquete
           $sretiros=new sretiros();
           $sretiros->actualizarMontoGrupal($lista);
           echo true;
         } catch (Exception $e) {
           echo $e->getMessage();
         }
    /*     break;

     }
   }
*/
