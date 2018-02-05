<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../logica/operaciones.php';
     include '../sql/s-consultas.php';
     include '../sql/s-retiros.php';

     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'actualizarMontoCuota':
         try {
           //rango de fecha actual
           $operacion=new operaciones();
           $fecha=$operacion->obtenerDiaFiltro();
           $fechaAnterior=$operacion->obtenerDiaFiltroAnterior();
           //obtiene a quienes se les va a pagar en esta fecha indicada
           $sconsultas=new sconsultas();
           $lista=$sconsultas->listarInversionistaCuota($fecha);
           for ($i=0; $i < count($lista); $i++) {
             //lee una fila de todo el arreglo bidimensional
             $fila=$lista[$i];
             $descripcion='Cuota N '.$fila['cuota'];
             $monto=$fila['paquete']*0.2;
             //obtiene una lista de paquetes y el nivel en q estan
             $paquetenivel=$sconsultas->obtenerPaquetePago($fila['idinversionista'],$fechaAnterior,$fecha);
             //se obtiene el monto de la comision por inversionista
             if (count($paquetenivel)>0&& $fila['rango']!=0) {
               $descripcion="$descripcion -  comision por afiliado";
               $monto=$monto+$operacion->obtenerComision($paquetenivel,$fila['rango']);
             }
             //se agregan dos columnas ... un monto y su decripcion de dicho monto
             $lista[$i]['monto']=$monto;
             $lista[$i]['descripcion']=$descripcion;
           }
           //se actualizan todos los montos en paquete
           $sretiros=new sretiro();
           $sretiros->actualizarMontoGrupal($lista);
           echo true;
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

      case 'actualizarEstado':
        $idinversion=$_REQUEST['idinversion'];
        $cuota=$_REQUEST['cuota'];
        $numerooperacion=$_REQUEST['numerooperacion'];
        try {
          $sretiro=new sretiro();
          $sretiro->actualizarEstado($idinversion,$cuota,$numerooperacion);
          echo true;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      case 'consultaRetiros2':
        session_start();
        $inversionista=$_SESSION['inversionista'];
        $idinversionista=$inversionista['idinversionista'];
        $fecha=date('Y-m-d');

        try {
          $sretiro=new sretiro();
          echo json_encode($sretiro->listarRetiros($idinversionista,$fecha));
        } catch (ErrorException $e) {
          echo "[{'error':'$e->getMessage()' }]";
        }
        break;
     }
   }
