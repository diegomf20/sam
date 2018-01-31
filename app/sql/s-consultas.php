<?php
/**
 *
 */
class sconsultas
{
  function consultaPagoInicial(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb_inversionista.idinversionista AS idinversionista,nombres,apellidos,fecha FROM `tb_inversionista` LEFT JOIN tb_inicial on tb_inversionista.idinversionista=tb_inicial.idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }
}
