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
  function cambiarEstado($idafiliado)
  {
    $db=new baseDatos();
    try {
      $fecha=date('Y-m-d');
      $estado=1;
      $conexion=$db->conectar();
      $sql='UPDATE tb_afiliacion set estado=:estado,fecha=:fecha WHERE idafiliado=:idafiliado';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idafiliado',$idafiliado);
      $sentencia->bindParam(':estado',$estado);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
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
