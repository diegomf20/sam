<?php
  $pagina='EXTRACTO';
  include 'retazos/generales/session.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <title>SAM-<?php echo $pagina ?></title>
  <!--scripts y css generales-->
  <?php include 'retazos/generales/css.php'; ?>
  <!--fin scripts y css generales-->
  <style >
    table .fa{
      font-size: 20px
    }
    .derecha{
      text-align: right;
    }
  </style>
</head>
  <body>
    <div id="app" class="panel">
      <!--Panel Menu-->
      <?php include 'retazos/panel/panel-menu.php'; ?>
      <!--Fin Panel Menu-->
      <div class="contenido">
        <div class="container-fluid">
          <!--Encabezado-->
          <?php include 'retazos/panel/contenido-head.php' ?>
          <!--Fin Encabezado-->
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  MOVIMIENTOS
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-bordered table-striped">
                        <tr>
                            <th>N° DE OPERACION</th>
                            <th>FECHA ASIGNADA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                        </tr>
                        <tr v-for="fila in tabla">
                          <td v-if="fila.cuota!=0">{{fila.numerooperacion}}</td>
                          <td class="derecha" v-else="fila.cuota!=0" ><i class="fa fa-arrow-right"></i></td>
                          <td>{{fila.fechaasignada}}</td>
                          <td  v-if="fila.cuota!=0">{{fila.descripcion.split('-')[0]}}</td>
                          <td  v-else="fila.cuota!=0">{{fila.descripcion.split('-')[1]}}</td>
                          <td class="txt-azul">$ {{fila.monto}}</td>
                          <td class="txt-rojo centrar" v-if="fila.estado==0"><i class="fa fa-clock-o"></i></td>
                          <td class="txt-verde centrar" v-else><i class="fa fa-check-circle-o"></i></td>
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
    <?php include 'retazos/generales/script.php'; ?>

    <script type="text/javascript">
      var vuejs=new Vue({
        el:'#app',
        data:{tabla:[]},
        methods:{
          listar: function(){
            $.ajax({
              url: 'app/control/c-pagos.php',
              type: 'POST',
              dataType:'json',
              data:{operacion:"consultaRetiros2"},
              success: function(response){
                vuejs.tabla=response;
                console.log(response);
              }
            });
          }
        }
      });
      vuejs.listar();
    </script>
  </body>
</html>
