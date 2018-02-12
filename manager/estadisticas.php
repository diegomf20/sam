<?php
  $pagina='ESTADISTICAS';
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

    <!-- lib estadisticas-->
     <link rel="stylesheet" href="../vendor/css/morris.css">
    <!--fin scripts y css generales-->
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
          <div class="row">
            <div class="col-xl-3 col-md-8">
              <div class="tarjeta">
                <div class="body totales rojo">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <h3 >  Dolares</h3>
                      <h2 >{{items.total}}</h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>MONTO TOTAL INVERTIDO</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales verde">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="col-7">
                      <h3>  Dolares</h3>
                      <h2 >{{items2.pago}}</h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>MONTO TOTAL PAGADO </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  fin Resumenes -->

        <div class="row">
                 <div class="col-lg-12">
                     <div class="panel panel-default">
                         <div class="panel-heading">
                             <i class="fa fa-bar-chart-o fa-fw"></i> Gráfica
                         </div>
                         <div class="panel-body">
                             <div class="row">
                                 <div class="col-xs-12 col-sm-2">
                                     <div class="row">
                                         <div class="col-xs-4 col-sm-12 form-group">
                                             <select class="form-control" id="cbperiodo">
                                                 <option value="0">MENSUAL</option>
                                                 <option value="1">ANUAL</option>
                                             </select>
                                         </div>
                                         <div class="col-xs-4 col-sm-12 form-group">
                                             <input class="form-control" type="number" name="txtanio" id="txtanio" min="2017" value="">
                                         </div>
                                         <div class="col-xs-8 col-sm-12 form-group">
                                             <button class="form-control btn-primar" onclick="graficar()" >Actualizar</button>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-10">
                                     <div id="morris-area-mes"></div>
                                 </div>
                                 <div class="col-xs-12 col-sm-10">
                                     <div id="morris-area-anio"></div>
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
  <script type="text/javascript" src="../vendor/framewoks/vue.min.js"> </script>
  <!--morris-->
  <script type="text/javascript" src="../vendor/framewoks/raphael-min.js"> </script>
  <script type="text/javascript" src="../vendor/framewoks/morris.min.js"> </script>

  <!--<script type="text/javascript" src="../vendor/js/estadisticas.js"> </script>-->
  <!--fin morris-->
  <script type="text/javascript">
    var vuejs=new Vue({
      el:'#app',
      data:{
        items:1,
        items2:[]
      },
      methods: {
        montoinvertido: function(event){
          $.ajax({
            url: '../app/control/c-estadisticas.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"totalinvertido"},
            success: function(response){
            //  inversion =response[0];
              vuejs.items=response[0];
              console.log(response);
            }
          });
        },

        montopagado: function(event){
          $.ajax({
            url: '../app/control/c-estadisticas.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"totalpagado"},
            success: function(response){
            //  inversion =response[0];
              vuejs.items2=response[0];
              console.log("entre al resultado")
              console.log(response);
            }
          });
        }


      }
    });
    vuejs.montoinvertido();
    vuejs.montopagado();

  </script>
  <script type="text/javascript" src="../vendor/js/estadisticas.js"> </script>
</html>
