<?php
if (isset($_REQUEST['operacion'])) {

  include '../sql/s-estadisticas.php';
  include '../db.php';
  $sestadisticas = new sestadisticas();
  $operacion=$_REQUEST['operacion'];
  $anio=$_REQUEST['anio'];
  switch ($operacion) {

    case 'totalinvertido':
      try {
        $monto = $sestadisticas->montototalinvertido();
        echo json_encode($monto);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
      break;

    case 'totalpagado':
      try {
        $pagado = $sestadisticas->montototalpagado();
        echo json_encode($pagado);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
      break;

    case 'graficamensual':
      try {
        $invertidomensual= $sestadisticas->invertidomensual($anio);
        $pagadomensual = $sestadisticas->pagadomensual($anio);

        $datos=[];
        for ($i=1; $i <=12 ; $i++) {
          $dato = ['mes'=>$i, 'inversion'=>0, 'pagado'=>0];
          array_push($datos,$dato);
        }


        for ($i=1; $i <=12 ; $i++) {
          
           for ($j=0; $j <count($invertidomensual); $j++) {
             $invertido=$invertidomensual[$j];
            // echo $i."-".$invertido['mes']." ";
             if ($i==$invertido['mes']) {
              // echo $invertido['mes']." holi";
                 $dato = ['mes'=>$invertido['mes'], 'inversion'=>$invertido['total'], 'pagado'=>0];
                 $datos[$i]=$dato;
                 break;
             }

           }

          //  $datos=['mes'=>$dato['mes'], 'inversion'=>$dato['inversion'], 'pagado' =>$dato['pagado']];
         }

        echo json_encode($datos);
      } catch (Exception $e) {
        echo $e->getMessage();
      }
      break;

    case 'graficaanual':
      try {
        $invertidoanual= $sestadisticas->inversionAnio();
        $pagadoanual = $sestadisticas->pagadoAnio();
      //  $invertidoanual[0]['pagado']=$pagadoanual[0]['total'];
        echo json_encode($invertidoanual);
      } catch (\Exception $e) {
          echo $e->getMessage();
      }
      break;
  }
}

 ?>
