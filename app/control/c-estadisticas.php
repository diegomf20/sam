<?php
if (isset($_REQUEST['operacion'])) {

  include '../sql/s-estadisticas.php';
  include '../db.php';
  $sestadisticas = new sestadisticas();
  $operacion=$_REQUEST['operacion'];
  switch ($operacion) {
    case 'totalinvertido':
      $monto = $sestadisticas->montototalinvertido();
      echo json_encode($monto);
      break;

    case 'totalpagado':
      $pagado = $sestadisticas->montototalpagado();
      echo json_encode($pagado);
      break;

    case 'utilidad':
      $pagado = $sestadisticas->utilidad();
      echo json_encode($pagado);
      break;

    default:
      # code...
      break;
  }

}

 ?>
