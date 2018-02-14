<?php
  $pagina='INVERSION INICIAL';
  include "sectores/session.php";
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
                    <div class="col-sm-12">
                      <table id="tabla" width=100% class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>NOMBRE Y APELLIDOS</td>
                            <td>NUMERO DE OPERACION</td>
                            <td>FECHA</td>
                            <td>PAQUETE</td>
                            <td>ESTADO</td>
                          </tr>
                        </thead>

                        <tr v-for="item in items">
                          <td>{{item.idinversionista}}</td>
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.numerooperacion}}</td>
                          <td>{{item.fecha}}</td>
                          <td>{{item.paquete}}</td>
                          <td>
                            <div v-bind:id="item.idinversionista" v-if="item.tipo==='1'">
                              INICIAL
                            </div>
                            <button v-bind:id="item.idinversionista" v-on:click="ingresarPaquete" type="button" name="button" v-if="item.tipo===null" class="btn-registrar">
                              INACTIVO
                            </button>
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
  <script type="text/javascript" src="../vendor/js/m-inversion-inicial.js">

  </script>
</html>
