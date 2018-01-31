<?php

class sinversionista
{
  /**
   * Registrar inversionista
   */
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
   /**
    * $idinversionista es el id de quien esta afiliando a este nuevo cliente
    */
   function registrarAfiliado($idinversionista,$nombres,$apellidos,$dni,$celular,$email,$imagen,$contrasenia){
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
       $safiliado=new safiliado();
       $safiliado->registrarAfiliacion($idinversionista,$id,1);

     } catch (PDOException $e) {
       throw $e;
     }
   }
  /**
   * Busquedas de inversionista
   */
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
       throw $e;
     }
   }

   function listarInversionistas(){
     $db=new baseDatos();
     try {
       $conexion=$db->conectar();
       $sql='SELECT tb_inversionista.`idinversionista`,`nombres`,`apellidos`,tb_inversion.fecha as fecha ,numerooperacion,paquete,tipo
       FROM tb_inicial INNER JOIN tb_inversionista ON tb_inicial.idinversionista=tb_inversionista.idinversionista
       LEFT JOIN tb_inversion ON tb_inversionista.idinversionista=tb_inversion.idinversionista 
       ORDER BY tb_inversionista.`idinversionista` DESC';
       $sentencia=$conexion->prepare($sql);
       $sentencia->execute();
       $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
       return $resultados;
     } catch (PDOException $e) {
       throw $e;
     }
   }
   function listarDatosInversionistas(){
     $db=new baseDatos();
     try {
       $conexion=$db->conectar();
       $sql='SELECT * FROM tb_inversionista ORDER BY tb_inversionista.`idinversionista` DESC';
       $sentencia=$conexion->prepare($sql);
       $sentencia->execute();
       $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
       return $resultados;
     } catch (PDOException $e) {
       throw $e;
     }
   }

  /**
   * Actualizaciones de datos del inversionista
   */
  function cambiarContrasenia($idinversionista,$contrasenia)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversionista SET contrasenia=:contrasenia WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':contrasenia',$contrasenia);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function cambiarDatosPersonales($idinversionista,$nombres,$apellidos,$dni,$celular,$direccion,$ciudad)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversionista
            SET nombres=:nombres, apellidos=:apellidos, dni=:dni, celular=:celular,direccion=:direccion,ciudad=:ciudad
            WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':nombres',$nombres);
      $sentencia->bindParam(':apellidos',$apellidos);
      $sentencia->bindParam(':dni',$dni);
      $sentencia->bindParam(':celular',$celular);
      $sentencia->bindParam(':direccion',$direccion);
      $sentencia->bindParam(':ciudad',$ciudad);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }
  function cambiarInformacionBancaria($idinversionista,$banco,$numerocuenta)
  {
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversionista
            SET banco=:banco, numerocuenta=:numerocuenta
            WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':banco',$banco);
      $sentencia->bindParam(':numerocuenta',$numerocuenta);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }

  function cambiarDiaPago($idinversionista)
  {
    $operaciones=new operaciones();
    $dia=$operaciones->obtenerDiaPago();
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='UPDATE tb_inversionista
            SET diapago=:diapago
            WHERE idinversionista=:idinversionista';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':idinversionista',$idinversionista);
      $sentencia->bindParam(':diapago',$dia);
      $sentencia->execute();
    } catch (PDOException $e) {
      throw $e;
    }
  }

}
