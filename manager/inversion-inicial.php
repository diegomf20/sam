<?php
  $pagina='INVERSION INICIAL';
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
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>ID</td>
                          <td>NOMBRE Y APELLIDOS</td>
                          <td>NUMERO DE OPERACION</td>
                          <td>FECHA</td>
                          <td>PAQUETE</td>
                          <td>ESTADO</td>
                        </tr>
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
                            <button v-bind:id="item.idinversionista" v-on:click="ingresarPaquete" type="button" name="button" v-if="item.tipo===null">
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
            url: '../app/control/c-inversionista.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"listarInversionistas"},
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