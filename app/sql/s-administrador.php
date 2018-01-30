<?php
/**
 *
 */
class sadministrador
{
  function buscarAdministradorUsuarioContrasenia($usuario,$contrasenia){
    $db=new baseDatos();
    try {
      $conexion=$db->conectar();
      $sql='SELECT * FROM tb_administrador WHERE usuario=:usuario AND contrasenia=:contrasenia';
      $sentencia=$conexion->prepare($sql);
      $sentencia->bindParam(':usuario',$usuario);
      $sentencia->bindParam(':contrasenia',$contrasenia);
      $sentencia->execute();
      $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      return $resultados[0];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
