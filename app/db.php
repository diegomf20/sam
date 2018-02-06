<?php
class baseDatos
{
  function conectar()
  {
    try {
      $pdo=new PDO('mysql:host=localhost;dbname=db_sam;','root','root');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      throw $e;
    }
  }
  /**
   * Resumenes
   *SELECT paquete,max(cuota),SUM(monto) FROM tb_inversion INNER JOIN tb_retiros ON tb_inversion.idinversion=tb_retiros.idinversion WHERE tb_inversion.idinversionista=59 AND tb_retiros.estado!=0 GROUP BY paquete
   *SELECT paquete,max(tb3.cuota),SUM(tb3.monto) AS recuperado FROM tb_inversion as tb1 LEFT JOIN (SELECT tb2.idinversion as id,tb2.cuota as cuota,tb2.monto as monto FROM tb_retiros as tb2 WHERE estado!=0) as tb3 ON tb1.idinversion=tb3.id WHERE tb1.idinversionista=59 GROUP BY tb1.paquete
   */

}
