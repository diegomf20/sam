<?php
if (isset($_REQUEST['operacion'])) {

  include '../sql/s-estadisticas.php';
  include '../db.php';
  $sestadisticas = new sestadisticas();
  $operacion=$_REQUEST['operacion'];
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
        $anio=$_REQUEST['anio'];
        $invertidomensual= $sestadisticas->invertidomensual($anio);
        $pagadomensual = $sestadisticas->pagadomensual($anio);

        $datos=[];
        for ($i=0; $i <12 ; $i++) {
          $dato = ['mes'=>(string)($i+1), 'inversion'=>0, 'pagado'=>0];
        //  array_push($datos,$dato);
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
          //var_dump($fila);
          for ($j=0; $j < count($pagadomensual) ; $j++) {
            $pagado=$pagadomensual[$j];
            //var_dump($pagado);
            if ($fila['mes']==$pagado['mes']) {
              $dato = ['mes'=>(string)$fila['mes'], 'inversion'=>(int)$fila['inversion'], 'pagado'=>(int)$pagado['total']];
              $datos[($i)]=$dato;
              break;
            }
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

    case 'grafica':

    $datos2=[];
    echo "aqui";
      try {
        $invertidoanual= $sestadisticas->inversionAnio();
        $pagadoanual = $sestadisticas->pagadoAnio();
/*
          for ($i=0; $i < count($invertidoanual); $i++) {
            $fila=$invertidoanual[$i];
            if (count($pagadoanual)==0) {
              $dato=['anio'=>$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=> 0 ];
              $datos2[$i]=$dato;
            }else{
              for ($j=0; $j<count($pagadoanual); $j++) {
                $pago = $pagadoanual[$j];
                echo ($fila['total']);
                if ($fila['anio']==$pago['anio']) {
                    $dato=['anio'=>$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=> (int)$pago['total'] ];
                    $datos2[$i]=$dato;
                    break;
                }else {
                  if ($pago['total']!=0 && ($fila['anio']!=$pago['anio'])) {
                    $dato=['anio'=>$pago['anio'], 'inversion'=>0, 'pagado'=>(int)$pago['total'] ];
                    $datos2[$i]=$dato;
                  }
                  if($fila['total']!=0 && ($fila['anio']!=$pago['anio']) ) {
                      $dato=['anio'=>$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=>0];
                      $datos2[$i]=$dato;
                  }
                }
              }
            }
          }
*/
  for ($i=0; $i <count($invertidoanual) ; $i++) {
    # code...
    $fila =$invertidoanual[$i];
    for ($j=0; $j <count($pagadoanual) ; $j++) {
      $pago=$pagadoanual[$j];
      if ($fila['anio']==$pago['anio']) {
        $dato=['anio'=>$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=> (int)$pago['total'] ];
        $datos2[$i]=$dato;
        break;
      }
      if ($pago['total']!=0 && ($fila['anio']!=$pago['anio'])) {
        $dato=['anio'=>$pago['anio'], 'inversion'=>0, 'pagado'=>(int)$pago['total'] ];
        $datos2[$i]=$dato;
      }
      if($fila['total']!=0 && ($fila['anio']!=$pago['anio']) ) {
          $dato=['anio'=>$fila['anio'], 'inversion'=>(int)$fila['total'], 'pagado'=>0];
          $datos2[$i]=$dato;
      }

    }
  }


        echo json_encode($datos2);
      } catch (Exception $e) {
          echo $e->getMessage();
      }
      break;
  }
}

 ?>
