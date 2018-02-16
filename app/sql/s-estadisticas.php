<?php

   /**
    *
    */
   class sestadisticas
   {

    function montoinvertido(){ //anual
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql ='SELECT SUM(paquete) inversion from tb_inversion WHERE tipo=1 ';

          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }

    function montoreinvertido(){ //anual
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql ='select paquete from tb_inversion WHERE tipo=2';
          $sentencia = $conexion->prepare($sql);
          $sentencia-> execute();
          $resultados =$sentencia -> fetchAll(PDO::FETCH_ASSOC);
          return $resultados;

        } catch (PDOException $e) {
          throw $e;
        }
    }

    function montoinicial(){ //anual
        $db = new baseDatos();

        try {
          $conexion= $db->conectar();

          $sql ='SELECT COUNT(idinversionista)*10 inicial from tb_inicial';
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

          $sql = 'SELECT month(fecha) as mes , (COUNT(idinversion)*10+SUM(paquete)) as total	from tb_inversion '.
                  'where tipo = 1 and year(fecha)=:anio group by month(fecha) order by month(fecha) asc ';
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

          $sql = 'SELECT year(fecha) as anio, ifnull(sum(paquete),0.00) as total from tb_inversion '.
                  'where tipo = 1 group by year(fecha) order by year(fecha) asc';
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
