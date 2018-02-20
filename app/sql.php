<?php
  /**
   *
   */
  class sql
  {

    function registraInversionista($nombres,$apellidos,$dni,$celular,$email,$imagen,$contrasenia){
      $db=new baseDatos();
      try {
        $conexion=$db->conectar();
        $sql='INSERT INTO tb_inversionista( nombres , apellidos , dni , celular ,email, imagen , contrasenia)'.
            ' VALUES( :nombres , :apellidos , :dni , :celular , :email , :imagen , :contrasenia)';
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':apellidos',$apellidos);
        $sentencia->bindParam(':dni',$dni);
        $sentencia->bindParam(':celular',$celular);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':imagen',$imagen);
        $sentencia->bindParam(':contrasenia',$contrasenia);
        $sentencia->execute();
        $id=$conexion->lastInsertId();
        return $id;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    function buscarClienteId($idinversionista){
      $db=new baseDatos();
      try {
        $conexion=$db->conectar();
        $sql='SELECT * FROM tb_inversionista WHERE idinversionista=:idinversionista';
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':idinversionista',$idinversionista);
        $sentencia->execute();
        $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultados[0];
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    function buscarClienteCorreoContrasenia($email,$contrasenia){
      $db=new baseDatos();
      try {
        $conexion=$db->conectar();
        $sql='SELECT * FROM tb_inversionista WHERE email=:email AND contrasenia=:contrasenia';
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':contrasenia',$contrasenia);
        $sentencia->execute();
        $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultados[0];
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

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
      } catch (PDOException $e) {
        echo $e->getMessage();
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

    function consultaExisteciaInversion($idinversionista){
      $operaciones=new operaciones();
      $db=new baseDatos();
      try {
        $conexion=$db->conectar();
        $sql='SELECT tb1.idinversionista FROM tb_inversion AS tb1
              INNER JOIN tb_inversionista AS tb2 ON tb1.idinversionista=tb2.idinversionista
              WHERE tb1.idinversionista=:idinversionista';
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':idinversionista',$idinversionista);
        $sentencia->execute();
        return (int)$sentencia->rowCount();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }
    function obtenerResumenes($idinversionista){
      $operaciones=new operaciones();
      $db=new baseDatos();
      try {
        $conexion=$db->conectar();
        //$sql='SELECT SUM(paquete) as from tb_inversion WHERE idinversionista =:idinversionista'
        $sql='SELECT sum(paquete) as paquete,0 as cuota, sum(monto) as recuperado FROM (SELECT paquete ,tipo, SUM(tb_retiros.monto) AS monto from tb_inversion INNER JOIN tb_retiros ON tb_inversion.idinversion=tb_retiros.idinversion WHERE tb_inversion.idinversionista=:idinversionista GROUP BY tb_retiros.idinversion) as td';
        $sentencia=$conexion->prepare($sql);
        $sentencia->bindParam(':idinversionista',$idinversionista);
        $sentencia->execute();
        $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultados[0];
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }


  }
