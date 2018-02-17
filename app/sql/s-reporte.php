<?php

/**
 *
 */
class sreportes
{

  function listAfilidosRango(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql="SELECT  concat(nombres,' ', apellidos) nombre, celular, CASE rango WHEN 0 THEN 'INVERSIONISTA'   WHEN 1 THEN 'EJECUTIVO'  WHEN 2 THEN 'PLATINO'   WHEN 3 THEN 'MASTER' ELSE 'ELITE' END as rango1 ".
          "FROM tb_inversionista ";
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function cantidadRango(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql="SELECT COUNT(idinversionista) cant, CASE rango WHEN 0 THEN 'INVERSIONISTA'   WHEN 1 THEN 'EJECUTIVO'  WHEN 2 THEN 'PLATINO'   WHEN 3 THEN 'MASTER' ELSE 'ELITE' END as rango1 ".
          "FROM tb_inversionista GROUP by rango ";
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function faltapaquete(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT concat(tb2.nombres," ", tb2.apellidos) nombre, tb2.celular celular , fechainscripcion fecha FROM tb_inversion tb '.
            'inner join  tb_inversionista tb2 on tb.idinversionista=tb2.idinversionista '.
            'WHERE inscripcion>0 and paquete is null';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function noRenovados(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb_inversionista.idinversionista as idinversionista,nombres,apellidos, tb2.fechaasignada fecha, celular '.
            'FROM `tb_inversionista` LEFT JOIN  '.
            '(SELECT idinversion, idinversionista, max(tipo) as tip from tb_inversion GROUP by idinversionista)as td ON tb_inversionista.idinversionista=td.idinversionista '.
            'inner join tb_retiros  tb2 on tb2.idinversion  = td.idinversion '.
            'WHERE cuotaretirada=6 and td.tip=1 and tb2.cuota=6';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function faltaRenovar(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb_inversionista.idinversionista as idinversionista,nombres,apellidos, celular, tb2.fechaasignada fecha, datediff(tb2.fechaasignada,curdate()) dias  '.
            'FROM tb_inversionista LEFT JOIN  '.
            '(SELECT idinversion, idinversionista, max(tipo) as tip from tb_inversion GROUP by idinversionista)as td ON tb_inversionista.idinversionista=td.idinversionista '.
            'inner join tb_retiros  tb2 on tb2.idinversion  = td.idinversion '.
            ' WHERE tb_inversionista.cuotaretirada > 4 and   td.tip=1 and tb2.cuota=6 and datediff(tb2.fechaasignada,curdate())>0';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }


}

 ?>
