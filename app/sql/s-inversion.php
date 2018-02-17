<?php
/**
 *
 */
class sinversion
{
  function insertarInversion($idinversionista){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inversion(idinversionista,tipo) VALUES (:idinversionista,1)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function registrarInscripcion($idinversion,$inscripcion,$fechainscripcion){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversion SET inscripcion=:inscripcion,fechainscripcion=:fechainscripcion WHERE idinversion=:idinversion';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversion',$idinversion);
      $sentencia->bindParam(':inscripcion',$inscripcion);
      $sentencia->bindParam(':fechainscripcion',$fechainscripcion);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function registrarInversionInicial($idinversionista,$idinversion,$paquete,$numerooperacion,$inscripcion,$fecha){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversion SET paquete=:paquete,numerooperacion=:numerooperacion,fecha=:fecha,inscripcion=:inscripcion '.
            'WHERE idinversion=:idinversion';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversion',$idinversion);
      $sentencia->bindParam(':paquete',$paquete);
      $sentencia->bindParam(':numerooperacion',$numerooperacion);
      $sentencia->bindParam(':inscripcion',$inscripcion);
      $sentencia->bindParam(':fecha',$fecha);
      //inserta la inversion
      $sentencia->execute();
      //inserta retiros con el Id anterior
      $sinversionista=new sinversionista();
      $this->insertarRetiros($idinversion,6);
      $sinversionista->cambiarDiaPago($idinversionista);
      $safiliado=new safiliado();
      $safiliado->cambiarEstado($idinversionista);
    } catch (PDOException $e) {
      echo 'insertar inversion:'.$e->getMessage();
    }
  }
  function registrarInversionRenovacion($idinversionista,$paquete,$numerooperacion,$cuotaretirada,$inscripcion,$fecha){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_inversion(idinversionista,paquete,numerooperacion,fecha,tipo,inscripcion,fechainscripcion) '.
            'VALUES (:idinversionista,:paquete,:numerooperacion,:fecha,2,:inscripcion,:fechainscripcion)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':paquete',$paquete);
      $sentencia->bindParam(':numerooperacion',$numerooperacion);
      $sentencia->bindParam(':inscripcion',$inscripcion);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->bindParam(':fechainscripcion',$fecha);

      //inserta la inversion
      $sentencia->execute();
      //opctiene el id de esa inversion
      $id=$conexion->lastInsertId();
      //inserta retiros con el Id anterior
      $sinversionista=new sinversionista();
      $inversionista=$sinversionista->buscarClienteId($idinversionista);
      $diapago=$inversionista['diapago'];
      $this->insertarRetiros2($id,6,$diapago,$cuotaretirada);
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
