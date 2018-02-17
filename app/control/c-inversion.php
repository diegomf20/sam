<?php
  if (isset($_REQUEST['operacion'])) {
    include '../db.php';
    include '../sql/s-inversion.php';
    include '../sql/s-inversionista.php';
    include '../sql/s-afiliado.php';
    include '../logica/operaciones.php';
    $sinversion=new sinversion();
    $operacion=$_REQUEST['operacion'];
    switch ($operacion) {
      //confirmados
      case 'registrarInscripcion':
        $idinversion=$_REQUEST['idinversion'];
        $inscripcion=$_REQUEST['inscripcion'];
        $fechainscripcion=date('Y-m-d');
        $sinversion->registrarInscripcion($idinversion,$inscripcion,$fechainscripcion);
        echo true;
        break;

      //para evaluacion si se queda o no
      case 'registrarInversionInicial':
        try {
          $idinversionista=$_REQUEST['idinversionista'];
          $idinversion=$_REQUEST['idinversion'];
          $paquete=$_REQUEST['paquete'];
          $numerooperacion=$_REQUEST['numerooperacion'];
          $fecha=date('Y-m-d');
          $inscripcion=10.0;
          if ($paquete==200||$paquete==300) {
            $inscripcion=10.0;
          }elseif ($paquete==500) {
            $inscripcion=15.0;
          }elseif ($paquete==1000) {
            $inscripcion=20.0;
          }
          $sinversion->registrarInversionInicial($idinversionista,$idinversion,$paquete,$numerooperacion,$inscripcion,$fecha);
          echo true;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;


      case 'registrarRenovacion':
        try {
          $idinversionista=$_REQUEST['idinversionista'];
          $sinversionista=new sinversionista();
          $resultado=$sinversion->obtenerPaquete($idinversionista);
          $inversionista=$sinversionista->buscarClienteId($idinversionista);

          $numerooperacion=$_REQUEST['numerooperacion'];
          $cuotaretirada=$inversionista['cuotaretirada'];
          $fecha=date('Y-m-d');

          $paquete=$resultado['paquete'];
          $inscripcion=10.0;
          if ($paquete==200) {
            $inscripcion=10.0;
          }elseif ($paquete==300) {
            $inscripcion=20.0;
          }elseif ($paquete==500) {
            $inscripcion=30.0;
          }elseif ($paquete==1000) {
            $inscripcion=50.0;
          }
          $sinversion->registrarInversionRenovacion($idinversionista,$paquete,$numerooperacion,$cuotaretirada,$inscripcion,$fecha);
          echo true;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
    }
  }
