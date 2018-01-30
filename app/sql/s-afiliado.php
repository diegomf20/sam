<?php
/**
 *
 */
class safiliado
{

  function registrarAfiliacion($idinversionista,$idafiliado,$nivel)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_afiliacion(idinversionista,idafiliado,nivel)'.
          ' VALUES(:idinversionista,:idafiliado,:nivel)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':idafiliado',$idafiliado);
      $sentencia->bindParam(':nivel',$nivel);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
}
