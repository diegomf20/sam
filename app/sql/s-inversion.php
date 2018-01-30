<?php
/**
 *
 */
class sinversion
{
  function insertarInversion($idinversionista,$paquete,$tipo){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inversion(idinversionista,paquete,tipo) VALUES (:idinversionista,:paquete,:tipo)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':paquete',$paquete);
      $sentencia->bindParam(':tipo',$tipo);
      $sentencia->execute();
      $id=$conexion->lastInsertId();
      if ($tipo==1) {//inicial
        $this->insertarRetiros($id,6);
      }else {//renovacion
        $this->insertarRetiros($id,3);
      }
      $sinversionista=new sinversionista();
      $sinversionista->cambiarDiaPago($idinversionista);
    } catch (PDOException $e) {
      echo 'insertar inversion:'.$e->getMessage();
    }
  }

  function insertarRetiros($idinversion,$numerocuotas){
    //variables
    $operaciones=new operaciones();
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_retiros(idinversion,cuota,fechaasignada) VALUES(:idinversion,:cuota,:fechaasignada)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversion',$idinversion);
      $sentencia->bindParam(':cuota',$cuota);
      $sentencia->bindParam(':fechaasignada',$fechaasignada);
      /**
       * el $idinversion sigue siendo el mismo para los execute query
       *$cuota se le asigna $i +1
       *$fechaasignada se le suma la cuota para cal
       */
      for ($i=0; $i <$numerocuotas ; $i++) {
        $cuota=$i+1;
        $fechaasignada=$operaciones->sumarMesAsignado($cuota);
        $sentencia->execute();
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
