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
  /**
   * obtiene la fecha filtro para saber a quienes se les corresponde
   * pagar en esta fecha
   */
  function obtenerDiaFiltro(){
    $dia=(int)date('d');
    if (1 <= $dia && $dia <= 9) {
      $dia=1;
    }elseif (10 <=$dia && $dia <= 19) {
      $dia=10;
    }elseif (20 <=$dia && $dia <= 31) {
      $dia=20;
    }
    return date('Y-m-').$dia;
  }

}
