<?php
  $pagina='DEPOSITOS PENDIENTES';
  session_start();
  $administrador=$_SESSION['administrador'];
  $administrador['nombres'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>SAM-<?php echo $pagina ?></title>
    <!--scripts y css generales-->
    <!--diseño-->
    <link rel="stylesheet" href="../vendor/framewoks/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/css/panel.css">
    <link rel="stylesheet" href="../vendor/css/forms.css">
    <link rel="stylesheet" href="../vendor/alertifyjs/css/alertify.min.css">
    <!--fuentes-->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,700,300">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!--fin scripts y css generales-->
    <style>
      .table{
        font-size: 12px
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
                      <h2 id="txt-inversion">2018-02-01</h2>
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
                      <button class="control">ACTUALIZAR</button>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>ACTUALIZAR MONTOS</h3>
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
                    <div class="col-sm-7">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>NOMBRE Y APELLIDOS</td>
                          <td>DESCRIPCION</td>
                          <td>MONTO</td>
                          <td>ESTADO</td>
                        </tr>
                        <tr v-for="item in items">
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.descripcion}}</td>
                          <td>{{item.monto}}</td>
                          <td>
                            <button v-bind:id="item.idinversionista" v-on:click="ingresarPaquete" type="button" name="button" >
                              INACTIVO
                            </button>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-sm-5">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>NOMBRE Y APELLIDOS</td>
                          <td>NUMERO DE OPERACION</td>
                        </tr>
                        <tr v-for="item in items">
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
        idinversionista:0,
        paquete:0,
        numerooperacion:'',
        items:[]
      },
      methods: {
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

        ingresarPaquete:function(event){
          alertify.prompt("SAM","Ingresar Paquete.", "0.00",
            function(evt, value ){vuejs.paquete=value;vuejs.idinversionista=event.target.id;
              setTimeout(function () {
                alertify.prompt("Ingresar Numero de transaccion.", "",
                  function(evt, value ){vuejs.numerooperacion=value;vuejs.insertar();},
                  function(){alertify.error('Cancelado');});
              }, 200);
            },
            function(){alertify.error('Cancelado');});
        },

        insertar: function(event){
          $.ajax({
            url: '../app/control/c-inversion.php',
            type:'POST',
            data:{operacion:"registrarInversion",idinversionista:vuejs.idinversionista,paquete:vuejs.paquete,numerooperacion:vuejs.numerooperacion},
            success: function(response){
              if (response) {
                alertify.success('Registrado inversion inicial');
              }else {
                alertify.error(response);
              }
              vuejs.actualizar();
            }
          });
        }
      }
    });
    vuejs.actualizar();



  </script>
</html>