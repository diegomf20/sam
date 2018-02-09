<?php
  $pagina='CLIENTES';
  session_start();
  $administrador=$_SESSION['administrador'];
  $administrador['nombres'];
?>
<html>
  <head>
    <title>SAM-<?php echo $pagina ?></title>
    <?php include 'sectores/head.php'; ?>
    <style>

    </style>
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
                      <table id="tabla" class="table table-bordered table-striped" width=100%>
                        <thead>
                          <tr>
                            <td>NOMBRE Y APELLIDOS</td>
                            <td>DNI</td>
                            <td>DIRECCION</td>
                            <td>CIUDAD</td>
                            <td>CELULAR</td>
                            <td>EMAIL</td>
                            <td>CONTRASEÑA</td>
                            <td>BANCO</td>
                            <td>N° CUENTA</td>
                            <td>DíA PAGO</td>
                          </tr>
                        </thead>

                        <tr v-for="item in items">
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.dni}}</td>
                          <td>{{item.direccion}}</td>
                          <td>{{item.ciudad}}</td>
                          <td>{{item.celular}}</td>
                          <td>{{item.email}}</td>
                          <td>{{item.contrasenia}}</td>
                          <td>{{item.banco}}</td>
                          <td>{{item.numerocuenta}}</td>
                          <td>{{item.diapago}}</td>
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
  <script type="text/javascript" src="../vendor/js/m-clientes.js"></script>
</html>
