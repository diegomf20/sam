<?php
if (isset($_REQUEST['operacion'])) {
  /**
   * includes
   */
   include '../db.php';
   include '../sql/s-alerta.php';
   $salerta=new salerta();
   session_start();
   $inversionista=$_SESSION['inversionista'];
   $operacion=$_REQUEST['operacion'];
   switch ($operacion) {
     case 'diasRenovacion':
       $array=$salerta->obtenerCuota6($inversionista['idinversionista']);
       $array2=$salerta->obtenerRenovacion($inversionista['idinversionista']);
       if (count($array)>0&&$inversionista['cuotaretirada']>=5&&count($array2)==0) {
          $fechapago=$array[0]['fechaasignada'];
          $fechahoy=Date('Y-m-d');
          $datetime1 = new DateTime($fechahoy);
          $datetime2 = new DateTime($fechapago);
          $interval = $datetime1->diff($datetime2);
          echo (int)$interval->format('%R%a');
       }else {
         echo "no";
       }

       break;

     default:
       # code...
       break;
   }
 }
