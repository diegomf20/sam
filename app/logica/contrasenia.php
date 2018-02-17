<?php
  /**
   *
   */
  class contrasenia
  {

      function generarpassword()
      {

        $caracteres="abcdefghijkmnlopqrstuvwxyz1234567890";
        $cantcaracteres= strlen($caracteres);
        $password="";

        for ($i=0; $i <8 ; $i++) {
            $posicion= rand(0,$cantcaracteres);
            $password .= substr($caracteres,$posicion,1);
        }
        return $password;
      }
    
  }
