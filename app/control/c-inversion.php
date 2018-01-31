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
      case 'registrarInversion':
        try {
          $sinversion->insertarInversion($_REQUEST['idinversionista'],$_REQUEST['paquete'],$_REQUEST['numerooperacion'],1);
          echo true;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;
      case 'registrarRenovacion':
        try {
          $resultado=$sinversion->obtenerPaquete($_REQUEST['idinversionista']);
          $paquete=$resultado['paquete'];
          $sinversion->insertarInversion($_REQUEST['idinversionista'],$paquete,$_REQUEST['numerooperacion'],2);
          echo true;
        } catch (Exception $e) {
          echo $e->getMessage();
        }
        break;

    }

  }
