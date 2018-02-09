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

    function invertidomensual($anio){
        $db = new baseDatos();


        try {
          $conexion= $db->conectar();

          $sql = 'SELECT month(fecha) as mes , SUM(paquete) as total	from tb_inversion
                  where tipo = 1 and year(fecha)=:anio group by month(fecha) order by month(fecha) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia->bindParam(':anio',$anio);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);

          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }

    }

    function pagadomensual($anio){
        $db = new baseDatos();


        try {
          $conexion= $db->conectar();

          $sql = 'SELECT month(fechaasignada) as mes , SUM(monto)+SUM(bono) as total	from tb_retiros
                  where estado = 1 and year(fechaasignada)=:anio group by month(fechaasignada) order by month(fechaasignada) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia->bindParam(':anio',$anio);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }

    }


    function inversionAnio(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT year(fecha) as anio, ifnull(sum(paquete),0.00) as total from tb_inversion
                  where tipo = 1 group by year(fecha) order by year(fecha) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }

    function pagadoAnio(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT year(fechaasignada) as anio, SUM(monto)+SUM(bono) as total	from tb_retiros
                  where estado = 1 group by year(fechaasignada) order by year(fechaasignada) asc';
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
