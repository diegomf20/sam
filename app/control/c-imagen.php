<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     include "../db.php";
     include "../sql/s-inversionista.php";
     $operacion=$_REQUEST['operacion'];
     switch ($operacion) {
       case 'dimensiones':
         try {
           if (isset($_FILES["file"]))
           {
               $file = $_FILES["file"];
               $ruta_provisional = $file["tmp_name"];
               $dimensiones = getimagesize($ruta_provisional);
               $width = $dimensiones[0];
               $height = $dimensiones[1];
               if ($width<$height) {
                 echo "alto";
               }else {
                 echo "ancho";
               }

           }

         } catch (Exception $e) {
           echo $e->getMessage();
         }
         break;
       case 'guardar':
        session_start();
         if (isset($_SESSION['inversionista'])) {
           $inversionista=$_SESSION['inversionista'];

         }
         if (isset($_FILES["file"]))
         {
             $file = $_FILES["file"];
             $nombre = $inversionista['dni'];
             $tipo = $file["type"];
             $ruta_provisional = $file["tmp_name"];
             $size = $file["size"];
             $dimensiones = getimagesize($ruta_provisional);

             $width = $dimensiones[0];
             $height = $dimensiones[1];
             $carpeta = "../../imagenes/";
             $extension="";// jpeg png o gift
             if ($tipo == 'image/jpg') {
               $nombre="$nombre.jpg";
               $extension=".jpg";
             }else if ($tipo == 'image/jpeg') {
               $nombre="$nombre.jpeg";
               $extension=".jpeg";
             }else if ($tipo == 'image/png') {
               $nombre="$nombre.png";
               $extension=".png";
             }else if ($tipo == 'image/gif') {
               $nombre="$nombre.gif";
               $extension=".gif";
             }

             if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
             {
               echo "Error, el archivo no es una imagen";
             }
             else if ($size > 1024*1024)
             {
               echo "Error, el tamaño máximo permitido es un 1MB";
             }
             /*else if ($width > 500 || $height > 500)
             {
                 echo "Error la anchura y la altura maxima permitida es 500px";
             }
             else if($width < 60 || $height < 60)
             {
                 echo "Error la anchura y la altura mínima permitida es 60px";
             }*/
             else
             {
                 $src = $carpeta.$nombre;
                 move_uploaded_file($ruta_provisional, $src);
                 $sinversionista=new sinversionista();
                 $sinversionista->cambiarImagen($inversionista['idinversionista'],$nombre);

                 if ($width>$height) {

                    //Desde donde
                    $x1 = ($width-$height)/2;
                    $y1 = 0;

                    //Ancho en pixeles
                    $ancho = $height;

                    //Alto en pixeles
                    $alto = $height;
                    $src_guardar =imagecreatetruecolor ($ancho, $alto); ; //Ponerla desde JavaScript por parametros
                    $trasparente = imagecolorallocate($src_guardar, 0, 0, 0);
                    if ($extension==".jpeg") {
                        $src_otro=imagecreatefromjpeg($src);
                    }elseif ($extension==".png") {
                        $src_otro=imagecreatefrompng($src);
                        imagecolortransparent($src_guardar,$trasparente);
                    }
                                        //$src_guardar = "../../imagenes/recortado.jpg"; //Donde la quiere guardar

                    // Redimensionar
                    imagecopyresampled($src_guardar, $src_otro, 0, 0, $x1, $y1, $ancho, $alto, $ancho, $alto);
                    if ($extension==".jpeg") {
                        imagejpeg($src_guardar,$src);
                    }elseif ($extension==".png") {
                        imagepng($src_guardar,$src);
                    }

                 }
                 $inversionista=$sinversionista->buscarClienteId($inversionista['idinversionista']);
                 $_SESSION['inversionista']=$inversionista;

                 echo "correcto";
             }
         }
         break;
     }
   }
