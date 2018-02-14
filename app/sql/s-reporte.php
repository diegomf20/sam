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
      $sql='SELECT  concat(nombres, apellidos) nombre, celular, CASE rango WHEN 0 THEN 'INVERSIONISTA'   WHEN 1 THEN 'EJECUTIVO'  WHEN 2 THEN 'PLATINO'   WHEN 3 THEN 'MASTER' ELSE 'ELITE' END as rango1 '.
          'FROM tb_inversionista ';
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
      $sql='SELECT COUNT(idinversionista) cant, CASE rango WHEN 0 THEN 'INVERSIONISTA'   WHEN 1 THEN 'EJECUTIVO'  WHEN 2 THEN 'PLATINO'   WHEN 3 THEN 'MASTER' ELSE 'ELITE' END as rango1 '.
          'FROM tb_inversionista GROUP by rango ';
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
      $sql='SELECT concat(nombres, apellidos) nombre, celular, tb2.fecha from tb_inversionista tb '.
            'inner join tb_inicial tb2  on tb2.idinversionista=tb.idinversionista '.
            'left join tb_inversion tb3 on tb3.idinversionista=tb2.idinversionista WHERE tb3.idinversionista is null';
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
      $sql='SELECT tb_inversionista.idinversionista as idinversionista,nombres,apellidos FROM `tb_inversionista` '.
            'LEFT JOIN  (SELECT idinversionista, max(tipo) as tip from tb_inversion GROUP by idinversionista) as td ON tb_inversionista.idinversionista=td.idinversionista '.
            'WHERE cuotaretirada=6 and td.tip=1';
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
