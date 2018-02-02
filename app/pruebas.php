<?php
  include 'control'
  include 'logica/operaciones.php';
  $operaciones=new operaciones();
  $paquetes=[];//retorna de ssconsultas
  $rango=2;
  $comision=0.00;
  if (rango==1) {
    for ($i=0; $i < count($paquetes); $i++) {
      $paquete=$paquetes[$i];
      if ($paquete['nivel']==1) {
        $comision+=$paquete['paquete']*0.08;
      }
    }
  }elseif (rango==2) {
    for ($i=0; $i < count($paquetes); $i++) {
      $paquete=$paquetes[$i];
      if ($paquete['nivel']==1) {
        $comision+=$paquete['paquete']*0.1;
      }
    }
  }elseif (rango==3) {
    for ($i=0; $i < count($paquetes); $i++) {
      $paquete=$paquetes[$i];
      if ($paquete['nivel']==1) {
        $comision+=$paquete['paquete']*0.1;
      }elseif ($paquete['nivel']==2) {
        $comision+=$paquete['paquete']*0.05;
      }
    }
  }elseif (rango==4) {
    for ($i=0; $i < count($paquetes); $i++) {
      $paquete=$paquetes[$i];
      if ($paquete['nivel']==1) {
        $comision+=$paquete['paquete']*0.1;
      }elseif ($paquete['nivel']==2) {
        $comision+=$paquete['paquete']*0.05;
      }elseif ($paquete['nivel']==3) {
        $comision+=$paquete['paquete']*0.03;
      }
    }
  }
  echo $comision;
