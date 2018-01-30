<?php
  if (isset($_REQUEST['operacion'])) {
    include '../db.php';
    include '../sql/s-inversion.php';
    include '../sql/s-inversionista.php';
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
    }
  }
