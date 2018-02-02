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
  function consultaInversionRenovacion(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb_inversionista.idinversionista as idinversionista,nombres,apellidos,numerooperacion,fecha,paquete,tipo
            FROM `tb_inversionista` LEFT JOIN
            (SELECT * FROM tb_inversion WHERE tipo=2) as td ON tb_inversionista.idinversionista=td.idinversionista
            WHERE cuotaretirada>4';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function consultaRetiros(){
    $db=new baseDatos();
    try {
      $operacion=new operaciones();
      $fecha=$operacion->obtenerDiaFiltro();
      $conexion=$db->conectar();
      $sql='SELECT * FROM `tb_retiros`
      INNER JOIN tb_inversion ON tb_retiros.idinversion=tb_inversion.idinversion
      INNER JOIN tb_inversionista ON tb_inversion.idinversionista=tb_inversionista.idinversionista
      WHERE `fechaasignada`=:fecha and estado=0';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':fecha',$fecha);
            $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function consultaArbol($idinversionista,$level){
    $db=new baseDatos();
    try {
      $operacion=new operaciones();
      $fecha=$operacion->obtenerDiaFiltro();
      $conexion=$db->conectar();
      $sql='SELECT tb1.idinversionista,idafiliado,tb2.nombres
            FROM tb_inversionista as tb1 INNER JOIN tb_afiliacion on tb1.idinversionista=tb_afiliacion.idinversionista
            INNER JOIN tb_inversionista as tb2 ON tb_afiliacion.idafiliado=tb2.idinversionista
            WHERE nivel=1 AND tb1.idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      $level++;
      if ($level<4) {
        for ($i=0; $i <count($resultados) ; $i++) {
          $resultados[$i]['arbol']=$this->consultaArbol($resultados[$i]['idafiliado'],$level);
        }
      }
      return $resultados;
    } catch (PDOException $e) {
      throw $e->getMessage();
    }
  }

  function obtenerPaquetePago($idinversionista, $fechainicio, $fechafinal){
    $db=new baseDatos();
    try {
      $operacion=new operaciones();
      $conexion=$db->conectar();
      $sql='SELECT paquete , nivel from tb_inversion as tb1
          inner join tb_afiliacion as tb2 on tb1.idinversionista = tb2.idafiliado
          inner join tb_inversionista as tb3 on tb2.idinversionista=tb3.idinversionista
          WHERE tb3.idinversionista=:idinversionista and tb1.fecha BETWEEN :$fechainicio  and :$fechafinal'
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':$fechainicio',$fechainicio);
      $sentencia->bindParam(':$fechafinal',$fechafinal);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
  }


}
