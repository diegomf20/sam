<?php

   /**
    *
    */
   class sestadisticas
   {

    function totalinvertido(){
      $db = new baseDatos();

      try {
        $conexion= $db->conectar();

        $sql ='select sum(paquete)+sum(inscripcion) as total from tb_inversion';

        $sentencia = $conexion->prepare($sql);
        $sentencia-> execute();
        $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
        return $resultados;

      } catch (PDOException $e) {
        throw $e;
      }
    }


    function montopagadocuotas(){
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
    function montopagadobonos(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT SUM(monto) as pago from tb_bono_afiliacion where estado =1';
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

          $sql = 'SELECT month(fechainscripcion) as mes , SUM(paquete)+SUM(inscripcion) as total	from tb_inversion '.
                  'where tipo = 1 and year(fechainscripcion)=:anio group by month(fechainscripcion) order by month(fechainscripcion) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia->bindParam(':anio',$anio);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);

          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }

    }

    function pagadomensualcuotas($anio){
        $db = new baseDatos();


        try {
          $conexion= $db->conectar();

          $sql = 'SELECT month(fechaasignada) as mes , SUM(monto) as total	from tb_retiros '.
                  'where estado = 1 and year(fechaasignada)=:anio group by month(fechaasignada) order by month(fechaasignada) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia->bindParam(':anio',$anio);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }

    }

    function pagadomensualbonos($anio){
        $db = new baseDatos();


        try {
          $conexion= $db->conectar();

          $sql = 'SELECT month(fecha) as mes , SUM(monto) as total from tb_bono_afiliacion '.
                  'where estado = 1 and year(fecha)=:anio group by month(fecha) order by month(fecha) asc';
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

          $sql = 'SELECT year(fechainscripcion) as anio, (sum(paquete)+SUM(inscripcion)) as total from tb_inversion
                  group by year(fechainscripcion) order by year(fechainscripcion) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }




    function pagadocuotaAnio(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT year(fechaasignada) as anio, SUM(monto) as total	from tb_retiros '.
                  'where estado = 1 group by year(fechaasignada) order by year(fechaasignada) asc';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }

    function pagadobonosAnio(){
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql = 'SELECT year(fecha) as anio, SUM(monto) as total from tb_bono_afiliacion '.
                  'where estado = 1 group by year(fecha) order by year(fecha) asc';
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
