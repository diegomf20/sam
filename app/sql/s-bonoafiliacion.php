<?php
class sbonoafiliacion
{

  function insertarBonoAfiliacion($idinversionista,$fecha,$datos)
  {
    $db=new baseDatos();

    $descripcion;
    $monto;
    $estado=0;
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_bono_afiliacion ( idinversionista, fecha, descripcion, monto, estado)
            VALUES ( :idinversionista, :fecha, :descripcion, :monto, :estado)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':fecha', $fecha);
      $sentencia->bindParam(':descripcion',$descripcion);
      $sentencia->bindParam(':monto',$monto);
      $sentencia->bindParam(':estado',$estado);
      echo count($datos);
      for ($i=0; $i <count($datos) ; $i++) {
        $dato= $datos[$i];
        $descripcion= $dato['descripcion'];
        $monto= $dato['comision'];
        $sentencia->execute();
      }
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function actualizarBonoAfiliacion($idinversionista)
  {
    $db=new baseDatos();

    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_bono_afiliacion SET estado=1
            WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }

}
