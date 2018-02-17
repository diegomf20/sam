<?php
class sconsultas
{
  //usuarios en general
  function consultaInversion(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT * FROM tb_inversionista INNER JOIN tb_inversion ON tb_inversionista.idinversionista=tb_inversion.idinversionista WHERE tipo=1';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }
  //usuarios que ya pagaron inscripcion y quieren pagar inicial
  function consultaInversionInicial(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT * FROM tb_inversionista INNER JOIN tb_inversion ON tb_inversionista.idinversionista=tb_inversion.idinversionista WHERE tipo=1 AND inscripcion is NOT null';
      $sentencia=$conexion->prepare($sql);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function consultaInversionRenovacion(){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb_inversionista.idinversionista as idinversionista,nombres,apellidos,numerooperacion,fecha,paquete,tipo '.
            'FROM `tb_inversionista` LEFT JOIN '.
            '(SELECT * FROM tb_inversion WHERE tipo=2) as td ON tb_inversionista.idinversionista=td.idinversionista '.
            'WHERE cuotaretirada>4';
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
      $sql='SELECT sum(idinversion) as idinversion,SUM(tb.cuota) as cuota,GROUP_CONCAT(tb.descripcion) as descripcion,SUM(tb.monto) as monto, tb.idinversionista, GROUP_CONCAT(nombres) AS nombres, GROUP_CONCAT(apellidos) AS apellidos,GROUP_CONCAT(banco) AS banco,GROUP_CONCAT(numerocuenta) AS numerocuenta '.
            'from ( '.
              '(SELECT tb1.idinversion,tb1.cuota,tb1.descripcion,monto ,tb3.idinversionista,tb3.nombres,tb3.apellidos,tb3.banco,tb3.numerocuenta '.
                'FROM tb_retiros AS tb1 INNER JOIN tb_inversion AS tb2 ON tb1.idinversion=tb2.idinversion '.
                'INNER JOIN tb_inversionista AS tb3 ON tb2.idinversionista=tb3.idinversionista '.
                'WHERE `fechaasignada`=:fecha and estado=0) '.
            'UNION '.
              '( SELECT 0,0,descripcion, monto, idinversionista, null,null,"" as banco,"" as numero from tb_bono_afiliacion '.
              'where fecha=:fecha AND estado=0 ) ) as tb '.
            'GROUP by tb.idinversionista';

      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function consultaRetirosPagados(){
    $db=new baseDatos();
    try {
      $operacion=new operaciones();
      $fecha=$operacion->obtenerDiaFiltro();
      $conexion=$db->conectar();
      $sql='SELECT nombres,apellidos,tb1.numerooperacion '.
            'FROM tb_retiros as tb1 INNER JOIN tb_inversion as tb2 ON tb1.idinversion=tb2.idinversion '.
            'INNER JOIN tb_inversionista AS tb3 ON tb2.idinversionista=tb3.idinversionista '.
            'WHERE fechaasignada=:fecha and estado=1';
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
      $sql='SELECT tb1.idinversionista,idafiliado,tb2.nombres, tb2.imagen, tb_afiliacion.estado  '.
            'FROM tb_inversionista as tb1 INNER JOIN tb_afiliacion on tb1.idinversionista=tb_afiliacion.idinversionista '.
            'INNER JOIN tb_inversionista as tb2 ON tb_afiliacion.idafiliado=tb2.idinversionista '.
            'WHERE nivel=1 AND tb1.idinversionista=:idinversionista';
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
      throw $e;
    }
  }

  function obtenerPaquetePago($idinversionista, $fechainicio, $fechafinal){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT paquete,nivel,tb4.nombres,tb4.apellidos,tb1.tipo '.
            'from tb_inversion as tb1 inner join tb_afiliacion as tb2 on tb1.idinversionista = tb2.idafiliado '.
            'inner join tb_inversionista as tb3 on tb2.idinversionista=tb3.idinversionista '.
            'inner join tb_inversionista as tb4 on tb4.idinversionista=tb2.idafiliado '.
            'WHERE tb3.idinversionista=:idinversionista and tb1.fecha BETWEEN :fechainicio  and :fechafinal';

      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':fechainicio',$fechainicio);
      $sentencia->bindParam(':fechafinal',$fechafinal);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll();
      echo json_encode($resultados);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function listarInversionistaCuota($fecha){

    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT tb1.idinversionista,tb1.rango,tb1.nombres,tb2.paquete,tb3.idinversion,tb3.cuota '.
          'FROM tb_inversionista AS tb1 INNER JOIN tb_inversion AS tb2 on tb1.idinversionista=tb2.idinversionista '.
          'INNER JOIN tb_retiros AS tb3 on tb3.idinversion=tb2.idinversion '.
          'WHERE tb3.fechaasignada=:fecha';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function consultaPendientes($idinversionista){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT nombres,apellidos,email,celular FROM tb_inversionista INNER JOIN tb_afiliacion on tb_inversionista.idinversionista=tb_afiliacion.idafiliado WHERE tb_afiliacion.estado=0 AND tb_afiliacion.idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados;
    } catch (PDOException $e) {
      throw $e;
    }
  }

}
