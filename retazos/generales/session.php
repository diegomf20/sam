<?php
$nombreApellidos='';
session_start();
if (isset($_SESSION['inversionista'])) {
  $inversionista=$_SESSION['inversionista'];
  //asignar a variables
  $nombres=$inversionista['nombres'];
  $apellidos=$inversionista['apellidos'];
  //dejar la primera palabra
  $posicionVacia=strpos($nombres," ");
  if ($posicionVacia>1) {
    $nombres=substr($nombres,0,$posicionVacia);
  }
  $posicionVacia=strpos($apellidos," ");
  if ($posicionVacia>1) {
    $apellidos=substr($apellidos,0,$posicionVacia);
  }
  $nombreApellidos=$nombres.' '.$apellidos;
}else {
  header('Location: login.php');
}
