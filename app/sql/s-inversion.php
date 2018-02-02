<?php
/**
 *
 */
class sinversion
{
  function insertarInversion($idinversionista,$paquete,$numerooperacion,$tipo){
    $db=new baseDatos();
    try {
      $fecha=date("Y-m-d");
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inversion(idinversionista,paquete,numerooperacion,fecha,tipo) VALUES (:idinversionista,:paquete,:numerooperacion,:fecha,:tipo)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':paquete',$paquete);
      $sentencia->bindParam(':tipo',$tipo);
      $sentencia->bindParam(':numerooperacion',$numerooperacion);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->execute();
      $id=$conexion->lastInsertId();
      if ($tipo==1) {//inicial
        $this->insertarRetiros($id,6);
      }else {//renovacion
        $this->insertarRetiros($id,3);
      }
      $sinversionista=new sinversionista();
      $sinversionista->cambiarDiaPago($idinversionista);
      $safiliado=new safiliado();
      $safiliado->cambiarEstado($idinversionista);

      
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
  function obtenerPaquete($idinversionista){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT paquete FROM tb_inversion WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados[0];
    } catch (PDOException $e) {
      throw $e;
    }
  }

}
