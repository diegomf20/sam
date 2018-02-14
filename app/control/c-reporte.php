<?php

  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../sql/s-reporte.php';

     $sreportes=new sreportes();
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'listaAfiliadosRango':
         try {
           $datos=$sreportes->listAfilidosRango();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break

       case 'cantRango':
         try {
           $datos=$sreportes->cantidadRango();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

       case 'faltapaquete':
         try {
           $datos=$sreportes->faltapaquete();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;

       case 'faltaRenovar':
         try {
           $datos=$sreportes->noRenovados();
           echo json_encode($datos);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;


     }
   }

 ?>
