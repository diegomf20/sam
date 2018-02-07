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

  function obtenerDiaFiltroAnterior(){
    $dia=(int)date('d');
    if (1 <= $dia && $dia <= 9) {
      $dia=2;
    }elseif (10 <=$dia && $dia <= 19) {
      $dia=11;
    }elseif (20 <=$dia && $dia <= 31) {
      $dia=21;
    }
    return date("Y-m-d", strtotime(date('Y-m-')."$dia - 1 months"));
  }

  /**
   * obtener la comision de afiliar a mas personas al negocio , entra parametros array y rango de inversionista
   */
   function obtenerComision($paquetes,$rango){
     $listacomisiondescripcion=[];
     $comision=0.00;
     $descripcion="";
     if ($rango==1) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.08;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }
       }
     }elseif ($rango==2) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.1;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }
       }
     }elseif ($rango==3) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.1;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }elseif ($paquete['nivel']==2) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.05;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }
       }
     }elseif ($rango==4) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.1;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }elseif ($paquete['nivel']==2) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.05;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }elseif ($paquete['nivel']==3) {
           $descripcion="Bono de afiliacion nivel ".$paquete['nivel']." (".$paquete['nombres']. " " . $paquete['apellidos']." )";
           $comision=$paquete['paquete']*0.03;
           $comisiondescripcion=["descripcion"=>$descripcion,"comision"=>$comision];
           array_push($listacomisiondescripcion,$comisiondescripcion);
         }
       }
     }
     return $listacomisiondescripcion;
   }

   function obtenerDescripcion($paquetes,$rango){
     $descripcion="";
     if ($rango==1||$rango==2) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1) {
           $descripcion="$descripcion ". $paquete['nombres'] . ",";
         }
       }
     }elseif ($rango==3) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1||$paquete['nivel']==2) {
           $descripcion="$descripcion ". $paquete['nombres'] . ",";
         }
       }
     }elseif ($rango==4) {
       for ($i=0; $i < count($paquetes); $i++) {
         $paquete=$paquetes[$i];
         if ($paquete['nivel']==1||$paquete['nivel']==2||$paquete['nivel']==3) {
           $descripcion="$descripcion ". $paquete['nombres'] . ",";
         }
       }
     }
     return $descripcion;
   }
}
