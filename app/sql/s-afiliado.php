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
      $idinversionista=$this->buscarAfiliado($idafiliado);//id afiliador a nivel 1
      //Palo
        $rango=new sinversionista();
        $rango-> actualizar($idinversionista);
      //
      $idinversionista=$this->buscarAfiliado($idinversionista);//id afiliado al nivel 2
      if ($idinversionista!=0) {
        $this->agregarNivel($idinversionista,$idafiliado,2,$estado,$fecha);
        $idinversionista=$this->buscarAfiliado($idinversionista);//id afiliado al nivel 3
        if ($idinversionista!=0) {
          $this->agregarNivel($idinversionista,$idafiliado,3,$estado,$fecha);
        }
      }
    } catch (PDOException $e) {
      throw $e;
    }
  }
  /**
   * agrega un nivel con estado 1 (activo)
   */

  function agregarNivel($idinversionista,$idafiliado,$nivel,$estado,$fecha){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='INSERT INTO tb_afiliacion(idinversionista,idafiliado,nivel,estado,fecha)'.
          ' VALUES(:idinversionista,:idafiliado,:nivel,:estado,:fecha)';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':idafiliado',$idafiliado);
      $sentencia->bindParam(':nivel',$nivel);
      $sentencia->bindParam(':estado',$estado);
      $sentencia->bindParam(':fecha',$fecha);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function buscarAfiliado($idafiliado)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT idinversionista from tb_afiliacion where idafiliado=:idafiliado ';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idafiliado',$idafiliado);
      $sentencia->execute();
      $datos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      if (count($datos)==0) {
        return 0;
      }else{
        return (int)$datos[0]['idinversionista'];
      }
    } catch (PDOException $e) {
      throw $e;
    }
  }



}
