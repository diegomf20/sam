<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include '../db.php';
     include '../sql/s-inicial.php';
     $sinicial=new sinicial();
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'insertarPagoInicial':
         try {
           $datos=$sinicial->insertarPagoAfiliacion($_REQUEST['idinversionista']);
           echo true;
         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;
     }
   }
