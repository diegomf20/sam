<?php
  $pagina='INVERSION RENOVACIÓN';
  session_start();
  $administrador=$_SESSION['administrador'];
  $administrador['nombres'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
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
                        <tbody>
                        <tr v-for="item in items">
                          <td>{{item.idinversionista}}</td>
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.numerooperacion}}</td>
                          <td>{{item.fecha}}</td>
                          <td>{{item.paquete}}</td>
                          <td>
                            <div v-bind:id="item.idinversionista" v-if="item.tipo==='2'">
                              RENOVADO
                            </div>
                            <button v-bind:id="item.idinversionista" v-on:click="insertarRenovacion" type="button" name="button" v-if="item.tipo===null">
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
  <script type="text/javascript" src="../vendor/framewoks/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../vendor/js/panel.js"></script>
  <script type="text/javascript" src="../vendor/alertifyjs/alertify.min.js"></script>
  <script type="text/javascript" src="../vendor/framewoks/vue.min.js">

  </script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
            data:{operacion:"consultaInversionRenovacion"},
            success: function(response){
              vuejs.items=response;
              setTimeout(function () {
                $('#tabla').DataTable({
                  responsive: true,
                  columnDefs: [
                      { responsivePriority: 1, targets: 0 },
                      { responsivePriority: 2, targets: -1 }
                  ]
                });
              }, 10);
              console.log(response);
            }
          });
        },

        insertarRenovacion:function(event){
          alertify.prompt("Ingresar Numero de transaccion.", "",
            function(evt, value ){
              $.ajax({
                url: '../app/control/c-inversion.php',
                type:'POST',
                data:{operacion:"registrarRenovacion",idinversionista:event.target.id,numerooperacion:value},
                success: function(response){
                  alert(response);
                  if (response) {
                    alertify.success('Registrado Renovación');
                  }else {
                    alertify.error(response);
                  }
                  vuejs.actualizar();
                }
              });
            },
            function(){alertify.error('Cancelado');});
        }
      }
    });
    vuejs.actualizar();
  </script>
</html>
<!--http://meridadesignblog.com/como-crear-tablas-responsivas-con-css/
http://fooplugins.github.io/FooTable/index.html
-->
