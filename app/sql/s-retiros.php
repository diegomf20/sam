<?php

 class sretiro
 {

   function actualizarMontoGrupal($datos)
   {
     //variables
     $descripcion="";
     $monto=0.0;
     $idinversion=0;
     $cuota=0;
     $bono=0;
     //

     $db=new baseDatos();

     try {
       $conexion=$db->conectar();
       $sql='UPDATE tb_retiros SET descripcion=:descripcion, monto=:monto , bono=:bono WHERE idinversion=:idinversion and cuota=:cuota';
       $sentencia=$conexion->prepare($sql);
       $sentencia->bindParam(':descripcion',$descripcion);
       $sentencia->bindParam(':monto', $monto);
       $sentencia->bindParam(':idinversion',$idinversion);
       $sentencia->bindParam(':cuota',$cuota);
       $sentencia->bindParam(':bono',$bono);
       for ($i=0; $i <count($datos) ; $i++) {
         $dato= $datos[$i];
         $descripcion= $dato['descripcion'];
         $monto= $dato['monto'];
         $idinversion= $dato['idinversion'];
         $cuota= $dato['cuota'];
         $bono=$dato['bono'];
         $sentencia->execute();
       }
     } catch (PDOException $e) {
       throw $e;
     }
   }
   function listarRetiros($idinversionista,$fecha)
   {
     $db=new baseDatos();
     try {
       $conexion=$db->conectar();
       $sql='SELECT * from
              ((SELECT cuota,tb2.numerooperacion,fechaasignada,descripcion, monto,estado
                FROM tb_inversion as tb1 INNER JOIN tb_retiros as tb2 ON tb1.idinversion=tb2.idinversion
                WHERE fechaasignada<=:fecha AND idinversionista=:idinversionista)
              union all
                (SELECT 0,null,fechaasignada,descripcion, bono,null
                  FROM tb_inversion as tb1 INNER JOIN tb_retiros as tb2 ON tb1.idinversion=tb2.idinversion
                  WHERE fechaasignada<=:fecha AND idinversionista=:idinversionista AND bono!=0)) AS tb
                  ORDER BY tb.fechaasignada DESC,tb.cuota DESC';
       $sentencia=$conexion->prepare($sql);
       $sentencia->bindParam(':idinversionista',$idinversionista);
       $sentencia->bindParam(':fecha', $fecha);
       $sentencia->execute();
       $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
       return $resultados;
     } catch (PDOException $e) {
       throw $e;
     }
   }

   function actualizarEstado($idinversion,$cuota,$numerooperacion){
     $db=new baseDatos();
     try {
       $conexion=$db->conectar();
       $sql='UPDATE tb_retiros SET numerooperacion=:numerooperacion, estado=1  WHERE idinversion=:idinversion and cuota=:cuota';
       $sentencia=$conexion->prepare($sql);
       $sentencia->bindParam(':numerooperacion',$numerooperacion);
       $sentencia->bindParam(':idinversion',$idinversion);
       $sentencia->bindParam(':cuota',$cuota);
       $sentencia->execute();
     } catch (PDOException $e) {
       throw $e;
     }
   }
 }
