<?php
$nombreApellidos='';
session_start();
if (isset($_SESSION['administrador'])) {
  $administrador=$_SESSION['administrador'];
}else {
  header('Location: index.php');
}
