<?php
  $pagina='TABLERO';
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
          <!--cuerpo de la pagina-->
          <div id="resumenes" class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales amarillo">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money"></i>
                    </div>
                    <div class="col-7">
                      <h3>Dolares</h3>
                      <h2 id="txt-inversion"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>INVERSIÓN</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales verde">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money"></i>
                    </div>
                    <div class="col-7">
                      <h3>Dolares</h3>
                      <h2 id="txt-recibido"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>RECIBIDO</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-calculator"></i>
                    </div>
                    <div class="col-7">
                      <h3>Unidad</h3>
                      <h2 id="txt-cuota"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>CUOTA</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales rojo">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <div class="col-7">
                      <h3>Personas</h3>
                      <h2><?php echo $inversionista['numeroafiliados'] ?></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>AFILIADOS</h3>
                </div>
              </div>
            </div>
          </div>
          <!--fin Resumenes-->
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="body">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php include 'retazos/generales/script.php' ?>
  <script type="text/javascript" src="vendor/js/tablero.js"></script>
</html>
