<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../logica/operaciones.php';
     include '../sql/s-consultas.php';
     include '../sql/s-retiros.php';
     include '../sql/s-inversionista.php';
     include '../sql/s-bonoafiliacion.php';
     include '../sql/s-actualizar.php';

     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'actualizarMontoCuota':
         try {
           //rango de fecha actual
           $operacion=new operaciones();
           $fecha=$operacion->obtenerDiaFiltro();
           $fechaayer=$operacion->obtenerDiaFiltroAyer();
           $fechaAnterior=$operacion->obtenerDiaFiltroAnterior();
           //obtiene a quienes se les va a pagar en esta fecha indicada
           $sconsultas=new sconsultas();
           $lista=$sconsultas->listarInversionistaCuota($fecha);
           for ($i=0; $i < count($lista); $i++) {
             $listacomisiondescripcion=[];
             //lee una fila de todo el arreglo bidimensional
             $fila=$lista[$i];
             $descripcion='Bono de Regalia N - '.$fila['cuota'];//descripcion de la cuota
             $monto=$fila['paquete']*0.2;//monto de bono de regalia
             $bono=0;//bono por afiliar a otras personas en los distintos niveles
             //obtiene una lista de paquetes y el nivel en q estan
             if ($fila['cuota']==1) {
               $paquetenivel=$sconsultas->obtenerPaquetePago($fila['idinversionista'],date("Y-m-d", strtotime("$fechaAnterior - 15 days")),$fechaayer);
             }else{
               $paquetenivel=$sconsultas->obtenerPaquetePago($fila['idinversionista'],$fechaAnterior,$fechaayer);
             }
             echo json_encode($paquetenivel)." <------> ".$fila['idinversionista'].$fecha." <------> ";
             //se obtiene el monto de la comision por inversionista

             if (count($paquetenivel)>0&& $fila['rango']!=0) {
               $listacomisiondescripcion=$operacion->obtenerComision($paquetenivel,$fila['rango']);
             }
             //se agregan dos columnas ... un monto y su decripcion de dicho monto
             $lista[$i]['lista']=$listacomisiondescripcion;
             $lista[$i]['monto']=$monto;
             $lista[$i]['descripcion']=$descripcion;
             $lista[$i]['fecha']=$fecha;

           }
           //se actualizan todos los montos en paquete
           //echo json_encode($lista);
           $sretiros=new sretiro();
           $sretiros->actualizarMontoGrupal($lista);
           $sactualizar=new sactualizar();
           $sactualizar->insertarActualizar($fecha);
           echo true;
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

      case 'actualizarEstado':
        $idinversionista=$_REQUEST['idinversionista'];
        $idinversion=$_REQUEST['idinversion'];
        $cuota=$_REQUEST['cuota'];
        $numerooperacion=$_REQUEST['numerooperacion'];
         $operacion=new operaciones();
        $fecha=$operacion->obtenerDiaFiltro();
        try {
          $sretiro=new sretiro();
          $sinversionista= new sinversionista();
          $sretiro->actualizarEstado($idinversion,$cuota,$numerooperacion);
          $sinversionista->actulizarCuotaretirada($idinversionista,$cuota);
          $bono=new sbonoafiliacion();
          $bono->actualizarBonoAfiliacion($idinversionista,$numerooperacion,$fecha);
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
