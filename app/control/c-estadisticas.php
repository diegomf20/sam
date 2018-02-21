<?php
if (isset($_REQUEST['operacion'])) {

  include '../sql/s-estadisticas.php';
  include '../db.php';
  $sestadisticas = new sestadisticas();
  $operacion=$_REQUEST['operacion'];
  switch ($operacion) {

    case 'totalinvertido':
      try {
        //$monto = $sestadisticas->montototalinvertido();
        $inversion = $sestadisticas->totalinvertido();

        echo json_encode($inversion);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
      break;

    case 'totalpagado':
      try {
        $cuotas = $sestadisticas->montopagadocuotas();
        $bonos = $sestadisticas->montopagadobonos();
        $a=$cuotas[0];
        $b=$bonos[0];
        $c=$a['pago']+$b['pago'];

        echo json_encode($c);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
      break;

    case 'graficamensual':
      try {
        $anio=$_REQUEST['anio'];
        $invertidomensual= $sestadisticas->invertidomensual($anio);
        $pagacuota = $sestadisticas->pagadomensualcuotas($anio); //retiros
        $pagobono = $sestadisticas->pagadomensualbonos($anio);  //bonos

//        var_dump($pagacuota);

        $pagadomensual = [];
        for ($i=0; $i <count($pagacuota) ; $i++) {
          $cuota=$pagacuota[$i];
          $total=['mes'=>$cuota['mes'], 'pagado'=>$cuota['total']];
          if (count($pagobono)==0) {
            $pagadomensual[$i]=$total;
          }elseif (count($pagobono)!=0) {
            for ($j=0; $j <count($pagobono) ; $j++) {
               $bono=$pagobono[$j];
               if ($bono['mes']==$cuota['mes']) {
                 $a=$cuota['total'];
                 $b=$bono['total'];
                 $c=$a+$b;
                 $total['pagado']=$c;
                 $pagadomensual[$i]=$total;
               }
               $pagadomensual[$i]=$total;
            }
          }

        }


        $datos=[];
        for ($i=0; $i <12 ; $i++) {
          $dato = ['mes'=>(string)($i+1), 'inversion'=>0, 'pagado'=>0];
         $datos[$i]=$dato;
        }

        for ($i=0; $i <12 ; $i++) {
           for ($j=0; $j <count($invertidomensual); $j++) {
             $invertido=$invertidomensual[$j];
             if (($i+1)==$invertido['mes']) {
                 $dato = ['mes'=>(string)$invertido['mes'], 'inversion'=>(int)$invertido['total'], 'pagado'=>0];
                 $datos[($i)]=$dato;
                 break;
             }
           }
        }


        for ($i=0; $i <12 ; $i++) {
          $fila=$datos[$i];
          $dato = ['mes'=>(string)$fila['mes'], 'inversion'=>(int)$fila['inversion'], 'pagado'=>(int)$fila['pagado']];
          for ($j=0; $j < count($pagadomensual) ; $j++) {
            $pagado=$pagadomensual[$j];
            if ($fila['mes']==$pagado['mes']) {
              $dato['pagado'] = (int)$pagado['pagado'];
              $datos[($i)]=$dato;
            }
            $datos[($i)]=$dato;
          }
        }

        for ($i=0; $i <12 ; $i++) {
          for ($j=0; $j <count($datos); $j++) {
            $fila=$datos[$i];
              if ($fila['mes']==($i+1)) {
                $dato = ['mes'=>(string)($anio."-".$fila['mes']), 'inversion'=>(int)$fila['inversion'], 'pagado'=>(int)$fila['pagado']];
                $datos[($i)]=$dato;
              }
          }
        }

        echo json_encode($datos);
      } catch (Exception $e) {
        echo $e->getMessage();
      }

      break;

    case 'grafica':  // graficos anuales
    $datos2=[];
      try {
        $invertidoanual= $sestadisticas->inversionAnio();
        $pagocuota = $sestadisticas->pagadocuotaAnio();
        $pagobono= $sestadisticas->pagadobonosAnio();

        $pagadoanual=[];
        for ($i=0; $i <count($pagocuota) ; $i++) {
          $cuota=$pagocuota[$i];
          $total=['anio'=>(string)$cuota['anio'], 'pagado'=>(int)$cuota['total']];
          if (count($pagobono)==0) {
            $pagadoanual[$i]=$total;
          }elseif (count($pagobono)!=0) {
            for ($j=0; $j <count($pagobono) ; $j++) {
              $bono = $pagobono[$j];
              if ($cuota['anio']==$bono['anio']) {
                $a=$cuota['total'];
                $b=$bono['total'];
                $c=$a+$b;
                $total['pagado']=$c;
                $pagadoanual[$i]=$total;
              }
                $pagadoanual[$i]=$total;
            }
          }
        }

        //var_dump($pagadoanual);

        $anioinicio=$invertidoanual[0]['anio']-1;
        $dato=['anio'=>(string)$anioinicio, 'inversion'=>0, 'pagado'=>0];
        array_push($datos2, $dato);

        for ($i=0; $i <count($invertidoanual) ; $i++) {
          $fila =$invertidoanual[$i];
          $dato=['anio'=>(string)$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=> 0 ];
          if (count($pagadoanual)==0) {
            $datos2[$i+1]=$dato;
          }elseif (count($pagadoanual)!=0) {
            for ($j=0; $j <count($pagadoanual) ; $j++) {
              $pago=$pagadoanual[$j];
              if ($fila['anio']==$pago['anio']) {
                $dato['pagado']=(int)$pago['pagado'];
                $datos2[$i+1]=$dato;
                break;
              }
              $datos2[$i+1]=$dato;
            }
          }

        }

        $anioinvertido=$invertidoanual[count($invertidoanual)-1]['anio']+1;
        $dato=['anio'=>(string)$anioinvertido, 'inversion'=>0, 'pagado'=> 0 ];
        array_push($datos2,$dato);

      /*  $aniopagado=$pagadoanual[count($pagadoanual)-1]['anio']+1;

        if ($anioinvertido>=$aniopagado) {
          $dato=['anio'=>(string)$anioinvertido, 'inversion'=>0, 'pagado'=> 0 ];
          array_push($datos2,$dato);
        }else{
          $dato=['anio'=>(string)$aniopagado, 'inversion'=>0, 'pagado'=> 0 ];
          array_push($datos2,$dato);
        }*/

        //var_dump($datos2);

      echo json_encode($datos2);
      } catch (Exception $e) {
          echo $e->getMessage();
      }
      break;
  }
}

 ?>
