<?php
  if (isset($_REQUEST['operacion'])) {
    /**
     * includes
     */
     $sql=new sql();

     include 'db.php';
     include 'sql.php';
     include 'logica/operaciones.php';
   }
