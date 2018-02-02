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
       echo "hola";
       throw $e;
     }
   }
 }

 ?>
