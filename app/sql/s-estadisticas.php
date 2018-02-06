<?php

   /**
    *
    */
   class sestadisticas
   {

    function montototalinvertido(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql ='SELECT (COUNT(idinversion)*10+ SUM(paquete) ) as total from tb_inversion ';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }

    function montototalpagado(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT SUM(monto) as pago from tb_retiros WHERE estado = 1';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }

    }

   }




 ?>
