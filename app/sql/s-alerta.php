<?php
/**
 *
 */
class salerta
{
  function obtenerCuota6($idinversionista)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT fechaasignada FROM tb_retiros INNER JOIN tb_inversion ON tb_retiros.idinversion=tb_inversion.idinversion WHERE cuota=6 AND idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function obtenerRenovacion($idinversionista)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT idinversion FROM tb_inversion WHERE tipo=2 AND idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }

}
