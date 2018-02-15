<?php
/**
 *
 */
class sinversion
{
  function insertarInversion($idinversionista,$paquete,$numerooperacion,$tipo,$cuotaretirada){
    $db=new baseDatos();
    try {
      $fecha=date("Y-m-d");
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inversion(idinversionista,paquete,numerooperacion,fecha,tipo) '.
            'VALUES (:idinversionista,:paquete,:numerooperacion,:fecha,:tipo)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':paquete',$paquete);
      $sentencia->bindParam(':tipo',$tipo);
      $sentencia->bindParam(':numerooperacion',$numerooperacion);
      $sentencia->bindParam(':fecha',$fecha);
      //inserta la inversion
      $sentencia->execute();
      //opctiene el id de esa inversion
      $id=$conexion->lastInsertId();
      //inserta retiros con el Id anterior
      $sinversionista=new sinversionista();
      if ($tipo==1) {
        $this->insertarRetiros($id,6);
        $sinversionista->cambiarDiaPago($idinversionista);
        $safiliado=new safiliado();
        $safiliado->cambiarEstado($idinversionista);
      }elseif($tipo==2){
        $inversionista=$sinversionista->buscarClienteId($idinversionista);
        $diapago=$inversionista['diapago'];
        $this->insertarRetiros2($id,6,$diapago,$cuotaretirada);
      }

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

  function insertarRetiros2($idinversion,$numerocuotas,$diapago,$cuotaretirada){
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
        $mes=$cuota;
        if ($cuotaretirada==5) {
          $mes++;
        }
        $cuota=$i+7;
        $fechaasignada=$operaciones->sumarMesAsignadoDiaPago($mes,$diapago);
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
  function obtenerEstadoRenovacion($idinversionista){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT * FROM tb_inversion WHERE idinversionista=:idinversionista AND tipo=2';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return count($resultados);
    } catch (PDOException $e) {
      throw $e;
    }
  }
}
