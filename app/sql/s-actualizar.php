<?php
class sactualizar
{

  function insertarActualizar($fecha)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_actualizar ( fecha )'.
            'VALUES (:fecha)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':fecha', $fecha);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function confirmarActualizar($fecha)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT * FROM `tb_actualizar` WHERE fecha=:fecha';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':fecha', $fecha);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return count($resultados);
    } catch (PDOException $e) {
      throw $e;
    }
  }
}
