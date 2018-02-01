<?php
  $pagina='DEPOSITOS PENDIENTES';
  include "sectores/session.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>SAM-<?php echo $pagina ?></title>
    <?php include 'sectores/head.php'; ?>
    <style>
      .table{
        font-size: 12px;
      }
      .btn-registrar{
        padding: 5px;
        font-size: 14px;
        color: #fff;
        background-color: #2489c5;
        border:1px solid #111;
      }
      #vistaImprimir td:nth-child(5),#vistaImprimir th:nth-child(5){display: none;}
      #vistaImprimir td:nth-child(6),#vistaImprimir th:nth-child(6){display: none;}
      @media screen and (max-width: 700px) {
        .tabla-responsiva th,.tabla-responsiva td,.tabla-responsiva tr {
          display: block;
        }
        .tabla-responsiva tr:first-child { display: none; }
        .tabla-responsiva td{
          position: relative;
        }
        .tabla-responsiva tr{
          border: 1px solid #dee2e6;
        }
        .tabla-responsiva td{
          border: none;
          padding-left: 120px;
        }
        .tabla-responsiva td:before {
            color: #111;
            content: '';
            display: block;
            left: 15px;
            position: absolute;
            font-weight: 700;
        }
        .tabla-responsiva td:nth-child(1):before { content: 'Nombre:'; }
        .tabla-responsiva td:nth-child(2):before { content: 'Descripción:'; }
        .tabla-responsiva td:nth-child(3):before { content: 'Monto:'; }
        .tabla-responsiva td:nth-child(4):before { content: 'Estado:'; }

      }
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
          <div class="row">
            <div class="col-xl-3 col-md-8">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <h3>FECHA</h3>
                      <h2 id="txt-inversion">{{fecha}}</h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>PAGO ACTUAL</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button v-if="estadoBoton==0" v-on:click="actualizarMontos" class="control">ACTUALIZAR</button>
                      <h3 v-else>MONTOS ASIGNADOS</h3>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3  class=centrar>ACTUALIZAR MONTOS</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <button onclick="imprimir('vistaImprimir');" class="control">IMPRIMIR</button>
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
                    <div id="vistaImprimir" class="col-sm-7">
                      <h5 class="centrar">PROCESANDO</h5>
                      <table class="table tabla-responsiva table-bordered table-striped">
                        <tr>
                          <th>NOMBRE Y APELLIDOS</th>
                          <th>DESCRIPCION</th>
                          <th>MONTO</th>
                          <th>ESTADO</th>
                          <th>BANCO</th>
                          <th>NUMERO CUENTA</th>
                        </tr>
                        <tr v-for="item in items">
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.descripcion}}</td>
                          <td>$ {{item.monto}}</td>
                          <td>
                            <button v-bind:id="item.idinversionista+'-'+item.idinversion+'-'+item.cuota" v-on:click="actualizarEstado" v-if="item.monto!=null" class=btn-registrar>
                              <i class="fa fa-save"></i> Pagar
                            </button>
                          </td>
                          <td>{{item.banco}}</td>
                          <td>{{item.numerocuenta}}</td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-sm-5">
                      <h5 class="centrar">PAGADO</h5>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <th>NOMBRE Y APELLIDOS</th>
                          <th>OPERACION</th>
                        </tr>
                        <tr v-for="item in items2">
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.numerooperacion}}</td>
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
  <script type="text/javascript" src="../vendor/framewoks/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../vendor/js/panel.js"></script>
  <script type="text/javascript" src="../vendor/alertifyjs/alertify.min.js"></script>
  <script type="text/javascript" src="../vendor/framewoks/vue.min.js">

  </script>
  <script type="text/javascript">
    var vuejs=new Vue({
      el:'#app',
      data:{
        fecha:"",
        estadoBoton:0,
        items:[],
        items2:[]
      },
      methods: {
        fechaPago: function(){
          $.ajax({
            url: '../app/control/c-consultas.php',
            type:'POST',
            data:{operacion:"fechaPago"},
            success: function(response){
              vuejs.fecha=response.split('/')[0];
              vuejs.estadoBoton=response.split('/')[1];
              console.log(response);
            }
          });
        },
        actualizar: function (event) {
          $.ajax({
            url: '../app/control/c-consultas.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"consultaRetiros"},
            success: function(response){
              vuejs.items=response;
              console.log(response);
            }
          });
        },
        actualizar2: function (event) {
          $.ajax({
            url: '../app/control/c-consultas.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"consultaRetirosPagados"},
            success: function(response){
              vuejs.items2=response;
              console.log(response);
            }
          });
        },
        actualizarMontos: function (event) {
          $.ajax({
            url: '../app/control/c-pagos.php',
            type:'POST',
            data:{operacion:"actualizarMontoCuota"},
            success: function(response){
              console.log(response);
              vuejs.fechaPago();
              vuejs.actualizar();
            }
          });
        },
        actualizarEstado:function(event){
          var ides=(event.target.id).split("-");
          var idinversionista=ides[0];
          var idinversion=ides[1];
          var cuota=ides[2];
          alertify.prompt("SAM","Ingresar Numero de transaccion.", "",
            function(evt, value ){
              var numerooperacion=value;
              //insertar desde ajax
              $.ajax({
                url: '../app/control/c-pagos.php',
                type:'POST',
                data:{
                  operacion:"actualizarEstado",
                  idinversionista:idinversionista,
                  idinversion:idinversion,
                  cuota:cuota,
                  numerooperacion:numerooperacion
                },
                success: function(response){
                  console.log(response);
                  if (response) {
                    alertify.success('Registrado Pago a Inversionista');
                  }else {
                    alertify.error(response);
                  }
                  vuejs.actualizar();
                  vuejs.actualizar2();
                }
              });
            },
            function(){alertify.error('Cancelado');});
        }
      }
    });
    vuejs.fechaPago();
    vuejs.actualizar();
    vuejs.actualizar2();

  </script>

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
