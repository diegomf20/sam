<?php
/**
 *
 */
class sinicial
{
  function insertarPagoAfiliacion($idinversionista){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inicial(idinversionista,fecha) VALUES (:idinversionista,:fecha)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':fecha',date("Y-m-d"));
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }
}
