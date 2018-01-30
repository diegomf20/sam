<?php
  $pagina='EXTRACTO';
  include 'retazos/generales/session.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <title>SAM-<?php echo $pagina ?></title>
  <!--scripts y css generales-->
  <?php include 'retazos/generales/css.php'; ?>
  <!--fin scripts y css generales-->
</head>
  <body>
    <div id="app" class="panel">
      <!--Panel Menu-->
      <?php include 'retazos/panel/panel-menu.php'; ?>
      <!--Fin Panel Menu-->
      <div class="contenido">
        <div class="container-fluid">
          <!--Encabezado-->
          <?php include 'retazos/panel/contenido-head.php' ?>
          <!--Fin Encabezado-->
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  MOVIMIENTOS
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-bordered table-striped">
                        <tr>
                            <th>N° DE OPERACION</th>
                            <th>CUOTA</th>
                            <th>FECHA ASIGNADA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td>1122145</td>
                          <td>4</td>
                          <td>10/12/2017</td>
                          <td>Cuota N° 4 por Inversion</td>
                          <td class="txt-azul">$ 50</td>
                          <td class="txt-rojo">PROCESANDO</td>
                        </tr>
                        <tr>
                          <td>1122145</td>
                          <td>3</td>
                          <td>10/12/2017</td>
                          <td>Cuota N° 3 por Inversion + comisión por afiliado</td>
                          <td class="txt-azul">$ 60</td>
                          <td class="txt-verde">PAGADO</td>
                        </tr>
                        <tr>
                          <td>1122145</td>
                          <td>2</td>
                          <td>10/12/2017</td>
                          <td>Cuota N° 2 por Inversion</td>
                          <td class="txt-azul">$ 50</td>
                          <td class="txt-verde">PAGADO</td>
                        </tr>
                        <tr>
                          <td>1122145</td>
                          <td>1</td>
                          <td>10/11/2017</td>
                          <td>Cuota N° 1 por Inversion</td>
                          <td class="txt-azul">$ 50</td>
                          <td class="txt-verde">PAGADO</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'retazos/generales/script.php'; ?>
  </body>
</html>
