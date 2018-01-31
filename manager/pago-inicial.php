<?php
  $pagina='PAGO INICIAL';
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
                    <div class="col-sm-8">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>ID</td>
                          <td>NOMBRE Y APELLIDOS</td>
                          <td>FECHA</td>
                          <td>AFILIACION</td>
                        </tr>
                        <tr v-for="item in items">
                          <td>{{item.idinversionista}}</td>
                          <td>{{item.nombres}} {{item.apellidos}}</td>
                          <td>{{item.fecha}}</td>
                          <td>
                            <button v-bind:id="item.idinversionista" v-on:click="insertarPago" v-if="item.fecha===null">
                              PAGAR
                            </button>
                            <div v-bind:id="item.idinversionista" v-else>
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
            data:{operacion:"consultaPagoInicial"},
            success: function(response){
              vuejs.items=response;
              console.log(response);
            }
          });
        },

        insertarPago:function(event){
          alertify.confirm("SAM","Confirmar pago de afiliación.",
            function(){
              $.ajax({
                url: '../app/control/c-inicial.php',
                type:'POST',
                data:{operacion:"insertarPagoInicial",idinversionista:event.target.id},
                success: function(response){
                  if (response) {
                    alertify.success('Registrado pago inicial');
                  }else {
                    alertify.error(response);
                  }
                  vuejs.actualizar();
                }
              });
            },
            function(){
              alertify.error('Cancel');
            });
        }
      }

    });
    vuejs.actualizar();



  </script>
</html>
