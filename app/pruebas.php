<?php
  echo date("d").'-'.(date("m")+12).'-'.date("Y");
  echo "<br>";
  print date("Y-m-");
  echo "<br>";
  echo date("Y-m-d", strtotime("29-1-2017 + 2 months"));
  include 'logica/operaciones.php';
  $operaciones=new operaciones();
  echo $operaciones->sumarMesAsignado(1);
