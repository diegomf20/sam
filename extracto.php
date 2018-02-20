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
    @media screen and (max-width: 700px) {
      table, thead, tbody, th, td, tr {
        display: block;
        }
        tr:first-child { display: none; }
        td{
          position: relative;
        }
        .table tr{
          border: 1px solid #dee2e6;
        }
        .table td{
          border: none;
          padding-left: 150px;
        }
        td:before {
            color: #111;
            content: '';
            display: block;
            left: 15px;
            position: absolute;
        }
      td:nth-child(1):before { content: 'OPERACION:'; }
      td:nth-child(2):before { content: 'FECHA:'; }
      td:nth-child(3):before { content: 'DESCRIPCIÓN:'; }
      td:nth-child(4):before { content: 'MONTO:'; }
      td:nth-child(5):before { content: 'ESTADO:'; }
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
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-calculator"></i>
                    </div>
                    <div class="col-7">
                      <h3>Dolares</h3>
                      <h2>{{totalRetiros}}</h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>TOTAL</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  MOVIMIENTOS
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table table-bordered ">
                        <tr>
                            <th>OPERACION</th>
                            <th>FECHA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                        </tr>
                        <tr v-for="fila in tabla">
                          <td >{{fila.numerooperacion}}</td>
                          <td>{{fila.fechaasignada}}</td>
                          <td  v-if="fila.cuota!=0">{{fila.descripcion}}</td>
                          <td  v-else="fila.cuota!=0">{{fila.descripcion}}</td>
                          <td class="txt-azul">$ {{fila.monto}}</td>
                          <td class="txt-rojo centrar" v-if="fila.estado==0"><i class="fa fa-clock-o"></i></td>
                          <td class="txt-verde centrar" v-else><i class="fa fa-check-circle-o"></i></td>
                        </tr>
                      </table>
                      <h2></h2>
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
        computed:{
          totalRetiros(){
            return this.tabla.reduce((sum,item)=>{
              if (item.estado!=0) {
                  return sum + Number(item.monto)
              }else {
                  return sum
              }
            },0);
          }
        },
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
