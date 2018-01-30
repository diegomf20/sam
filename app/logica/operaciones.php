<?php
/**
 * Logica de operaciones
 */
class operaciones
{

  /**
   * captura la fecha del servidor y retorna la fecha segun la cuota solicitada
   *ejemplo: date(0)=5-10-2017;
   *          solicita la segunda cuota
   *          return date(2)=10-12-2017
   */
  function sumarMesAsignado($cantidadSumada){
    $dia=(int)date('d');
    if (2 <= $dia && $dia <= 10) {
      $dia=10;
    }elseif (11 <=$dia && $dia <= 20) {
      $dia=20;
    }elseif (21 <=$dia && $dia <= 31) {
      $dia=1;
      $cantidadSumada++;
    } else {
      $dia=1;
    }
    return date("Y-m-d", strtotime(date('Y-m-')."$dia + $cantidadSumada months"));
  }
  function obtenerDiaPago(){
    $dia=(int)date('d');
    if (2 <= $dia && $dia <= 10) {
      $dia=10;
    }elseif (11 <=$dia && $dia <= 20) {
      $dia=20;
    }elseif (21 <=$dia && $dia <= 31) {
      $dia=1;
    }
    return $dia;
  }




}
