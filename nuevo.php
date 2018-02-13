<?php
  $pagina='NUEVO';
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
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
              <div class="tarjeta">
                <div class="header">
                  Afilia a un nuevo inversionista
                </div>
                <div class="body">
                  <div class="registrar">
                    <h1></h1>
                    <div class="row">
                      <div class="col-sm-6">
                          <input id="nombres" type="text" class="control" placeholder="Nombres">
                      </div>
                      <div class="col-sm-6">
                          <input id="apellidos" type="text" class="control" placeholder="Apellidos">
                      </div>
                      <div class="col-sm-12">
                          <input id="email" type="text" class="control" placeholder="Email">
                      </div>
                      <div class="col-sm-6">
                          <input id="dni" type="text" class="control" placeholder="DNI">
                      </div>
                      <div class="col-sm-6">
                          <input id="celular" type="text" class="control" placeholder="celular">
                      </div>
                      <div class="col-sm-12">
      									<input id="terminos" type="checkbox"> Aceptar terminos y condiciones
      								</div>
      								<div class="col-sm-12">
                          <button id="registrar" class="control boton-default">REGISTRAR</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3">

            </div>
          </div>

        </div>
      </div>
    </div>
    <?php include 'retazos/generales/script.php'; ?>

  </body>
</html>
