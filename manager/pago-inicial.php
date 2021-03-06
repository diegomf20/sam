<?php
  $pagina='PAGO INICIAL';
  include "sectores/session.php"
?>
<html>
  <head>
    <title>SAM-<?php echo $pagina ?></title>
    <?php include 'sectores/head.php'; ?>
  </head>
  <body>
    <div id="app" class="panel">
      <!--Panel Menu-->
      <?php include '../retazos/panel/panel-menu-administrador.php'; ?>
      <!--Fin Panel Menu-->
      <div class="contenido">
        <div class="container-fluid">
          <!--Encabezado-->
          <?php include '../retazos/panel/contenido-head.php' ?>
          <!--Fin Encabezado-->
          <!--cuerpo de la pagina-->

          <!--fin Resumenes-->
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  <div class="row">
                    <div class="col-sm-8">
                      Lista de Inversionistas
                    </div>
                  </div>
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-sm-8">
                      <table id="tabla" width="100%" class="table table-bordered table-striped" >
                        <thead>
                          <tr>
                            <td></td>
                            <td>NOMBRE Y APELLIDOS</td>
                            <td>FECHA</td>
                            <td>MONTO</td>
                            <td>INSCRIPCION</td>
                          </tr>
                        </thead>

                        <tr v-for="item in items">
                          <td>{{item.idinversionista}}</td>
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.fechainscripcion}}</td>
                          <td>{{ item.inscripcion}}</td>
                          <td>
                            <button name=pagar  v-bind:id="item.idinversion"  v-on:click="insertarPago" v-if="item.inscripcion===null" class="btn-registrar">
                              PAGAR
                            </button>
                            <div v-else>
                              PAGADO
                            </div>
                          </td>
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
  </body>
  <?php include 'sectores/script.php'; ?>
  <script type="text/javascript" src="../vendor/js/m-pago-inicial.js"></script>
</html>
