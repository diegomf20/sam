<?php
 /**
  *
  */
 class sretiro
 {

   function monto (){

       $db=new baseDatos($idinversionista);
       try {
         $conexion=$db->conectar();
         $sql='SELECT paquete*0.2 FROM tb_inversionista as tb1
              inner join tb_inversion as tb2 on tb1.idinversionista=tb2.idinversionista
              WHERE tb1.idinversionista=:idinversionista and fecha BETWEEN "2018-1-20" and "2018-2-1"';

         $sentencia=$conexion->prepare($sql);
         $sentencia->bindParam(':idinversionista',$idinversionista);
         $sentencia->execute();
         $resultados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         return $resultados;
       } catch (PDOException $e) {
         throw $e->getMessage();
       }


   }

   function actualizarMonto($idinversionista, $descripcion, $monto)
   {
     $db=new baseDatos();
     $estado=0;
     try {
       $conexion=$db->conectar();
       $sql='UPDATE tb_retiros SET descripcion=:descripcion, monto=:monto, estado=:estado  WHERE idinversionista=:idinversionista';
       $sentencia=$conexion->prepare($sql);
       $sentencia->bindParam(':descripcion',$descripcion);
       $sentencia->bindParam(':monto', $monto);
       $sentencia->bindParam(':estado', $estado);
       $sentencia->bindParam(':idinversionista',$idinversionista);
       $sentencia->execute();
     } catch (PDOException $e) {
       throw $e;
     }
   }
 }

 ?>
