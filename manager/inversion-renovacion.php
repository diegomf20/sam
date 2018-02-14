<?php
  $pagina='INVERSION RENOVACIÓN';
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
                            <td>NOMBRE Y APELLIDOS</td>
                            <td>OPERACIÓN</td>
                            <td>FECHA</td>
                            <td>PAQUETE</td>
                            <td>ESTADO</td>
                          </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in items">
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.numerooperacion}}</td>
                          <td>{{item.fecha}}</td>
                          <td>{{item.paquete}}</td>
                          <td class="centrar">
                            <div v-bind:id="item.idinversionista" v-if="item.tipo==='2'" >
                              RENOVADO
                            </div>
                            <button  v-bind:id="item.idinversionista" v-on:click="insertarRenovacion" type="button" name="button" v-if="item.tipo===null" class="btn-registrar">
                              RENOVAR
                            </button>
                          </td>
                        </tr>
                      </tbody>
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
  <script type="text/javascript" src="../vendor/js/m-inversion-renovacion.js"></script>
</html>
<!--http://meridadesignblog.com/como-crear-tablas-responsivas-con-css/
http://fooplugins.github.io/FooTable/index.html
-->
