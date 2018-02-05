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
     //

     $db=new baseDatos();

     try {
       $conexion=$db->conectar();
       $sql='UPDATE tb_retiros SET descripcion=:descripcion, monto=:monto  WHERE idinversion=:idinversion and cuota=:cuota';
       $sentencia=$conexion->prepare($sql);
       $sentencia->bindParam(':descripcion',$descripcion);
       $sentencia->bindParam(':monto', $monto);
       $sentencia->bindParam(':idinversion',$idinversion);
       $sentencia->bindParam(':cuota',$cuota);
       for ($i=0; $i <count($datos) ; $i++) {
         $dato= $datos[$i];
         $descripcion= $dato['descripcion'];
         $monto= $dato['monto'];
         $idinversion= $dato['idinversion'];
         $cuota= $dato['cuota'];
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
       $sql='SELECT cuota,numerooperacion,fechaasignada,descripcion, monto,estado
            FROM tb_inversion INNER JOIN tb_retiros ON tb_inversion.idinversion=tb_retiros.idinversion
            WHERE fechaasignada<=:fecha AND idinversionista=:idinversionista';
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
 }
