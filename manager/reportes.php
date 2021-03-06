<?php
  $pagina='REPORTES';
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
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button onclick="imprimir('vistaImprimir1');" class="control">IMPRIMIR</button>
                      <h3 v-else>MONTOS ASIGNADOS</h3>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3  class=centrar>IMPRIMIR REPORTE</h3>
                </div>
              </div>
            </div>
          </div>
        <!--fin Resumenes-->
          <!--lista de afiliados  por rangos -->
          <div id="vistaImprimir1" class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  <div class="row">
                    <div class="col-sm-8">
                      Lista de afiliados por rango
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
                            <td>CELULAR</td>
                            <td>RANGO</td>
                          </tr>
                        </thead>

                        <tr v-for="list in listaafiliado">
                          <td>{{list.nombre}}</td>
                          <td>{{list.celular}}</td>
                          <td>{{list.rango1}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button onclick="imprimir('vistaImprimir2');" class="control">IMPRIMIR</button>
                      <h3 v-else>MONTOS ASIGNADOS</h3>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3  class=centrar>IMPRIMIR REPORTE</h3>
                </div>
              </div>
            </div>
          </div>
          <!--cantidad por rangos -->
          <div id="vistaImprimir2" class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  <div class="row">
                    <div class="col-sm-8">
                      Cantidad de afiliados por rango
                    </div>
                  </div>
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="tabla" width=100% class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <td>CANTIDAD</td>
                            <td>RANGO</td>
                          </tr>
                        </thead>

                        <tr v-for="list2 in cantafiliado">
                          <td>{{list2.cant}}</td>
                          <td>{{list2.rango1}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button onclick="imprimir('vistaImprimir3');" class="control">IMPRIMIR</button>
                      <h3 v-else>MONTOS ASIGNADOS</h3>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3  class=centrar>IMPRIMIR REPORTE</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- falta paquete -->
          <div id="vistaImprimir3" class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  <div class="row">
                    <div class="col-sm-8">
                      Lista de afiliados que aun no pagan su paquete
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
                            <td>CELULAR</td>
                            <td>FECHA</td>
                          </tr>
                        </thead>

                        <tr v-for="list3 in nopaquetes">
                          <td>{{list3.nombre}}</td>
                          <td>{{list3.celular}}</td>
                          <td>{{list3.fecha}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button onclick="imprimir('vistaImprimir4');" class="control">IMPRIMIR</button>
                      <h3 v-else>MONTOS ASIGNADOS</h3>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3  class=centrar>IMPRIMIR REPORTE</h3>
                </div>
              </div>
            </div>
          </div>
            <!-- falta renovar  -->
            <div id="vistaImprimir4" class="row">
              <div class="col-sm-12">
                <div class="tarjeta">
                  <div class="header">
                    <div class="row">
                      <div class="col-sm-8">
                        Lista de afiliados que no renuevan pasado la fecha
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
                              <td>CELULAR</td>
                              <td>FECHA</td>

                            </tr>
                          </thead>

                          <tr v-for="list4 in norenova">
                            <td>{{list4.idinversionista}}</td>
                            <td>{{list4.nombres}} {{list4.apellidos}}</td>
                            <td>{{list4.celular}}</td>
                            <td>{{list4.fecha}}</td>

                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="tarjeta">
                  <div class="body totales azul">
                    <div class="row">
                      <div class="col-5 centrar">
                        <i class="fa fa-print" aria-hidden="true"></i>
                      </div>
                      <div class="col-7">
                        <button onclick="imprimir('vistaImprimir5');" class="control">IMPRIMIR</button>
                        <h3 v-else>MONTOS ASIGNADOS</h3>
                      </div>
                    </div>
                  </div>
                  <div class="footer">
                    <h3  class=centrar>IMPRIMIR REPORTE</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- renovar -->
            <div id="vistaImprimir5" class="row">
              <div class="col-sm-12">
                <div class="tarjeta">
                  <div class="header">
                    <div class="row">
                      <div class="col-sm-8">
                        Lista de afiliados que próximos se  renuevan
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
                              <td>CELULAR</td>
                              <td>FECHA</td>
                              <td>DIAS</td>

                            </tr>
                          </thead>

                          <tr v-for="list5 in faltrenovar">
                            <td>{{list5.idinversionista}}</td>
                            <td>{{list5.nombres}} {{list5.apellidos}}</td>
                            <td>{{list5.celular}}</td>
                            <td>{{list5.fecha}}</td>
                            <td>{{list5.dias}}</td>

                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--acabo -->
        </div>
      </div>
    </div>
  </body>
  <?php include 'sectores/script.php'; ?>
  <script type="text/javascript" src="../vendor/js/m-reportes.js"></script>

  <script>
      function imprimir(nombre) {
          var backup=document.body.innerHTML;
          var ficha = document.getElementById(nombre).innerHTML;
          document.body.innerHTML=ficha;
          window.print( );
          document.body.innerHTML=backup;
      }
  </script>
</html>
