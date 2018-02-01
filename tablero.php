<?php
  $pagina='TABLERO';
  include 'retazos/generales/session.php'
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>SAM-<?php echo $pagina ?></title>
    <!--scripts y css generales-->
    <?php include 'retazos/generales/css.php'; ?>
    <!--fin scripts y css generales-->
    <style id="estilos">

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
          <!--cuerpo de la pagina-->
          <div id="resumenes" class="row">
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales amarillo">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money"></i>
                    </div>
                    <div class="col-7">
                      <h3>Dolares</h3>
                      <h2 id="txt-inversion"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>INVERSIÓN</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales verde">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-money"></i>
                    </div>
                    <div class="col-7">
                      <h3>Dolares</h3>
                      <h2 id="txt-recibido"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>RECIBIDO</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales azul">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-calculator"></i>
                    </div>
                    <div class="col-7">
                      <h3>Unidad</h3>
                      <h2 id="txt-cuota"></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>CUOTA</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="tarjeta">
                <div class="body totales rojo">
                  <div class="row">
                    <div class="col-5 centrar">
                      <i class="fa fa-address-book-o"></i>
                    </div>
                    <div class="col-7">
                      <h3>Personas</h3>
                      <h2><?php echo $inversionista['numeroafiliados'] ?></h2>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <h3 class=centrar>AFILIADOS</h3>
                </div>
              </div>
            </div>
          </div>
          <!--fin Resumenes-->
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="body">
                  <div class="rama1">
                    <div class="centrar"  v-for="arboles in arbol">
                      <div class="arbol">
                          <div class="arbol-img">
                            <img src="vendor/img/usuario.jpg">
                          </div>
                          <div class="arbol-nombre">
                            <h5>{{arboles.nombres}}</h5>
                          </div>
                      </div>
                      <div :class="'rama'+ arboles.idafiliado ">
                        <div class="centrar" v-for="arboles2 in arboles.arbol">
                          {{arboles2.nombres}}
                        </div>
                      </div>
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
  <?php include 'retazos/generales/script.php' ?>
  <script type="text/javascript" src="vendor/js/tablero.js"></script>

  <script type="text/javascript">
    var vuejs=new Vue({
      el:'#app',
      data:{
        arbol:[]
      },
      methods: {
        actualizar: function (event) {
          $.ajax({
            url: 'app/control/c-consultas.php',
            type:'POST',
            dataType: "json",
            data:{operacion:"consultaArbol"},
            success: function(response){
              //asignado datos
              vuejs.arbol=response;
              //asiganr rama
              var id=1;
              var rama=vuejs.arbol.length;
              var grid='';
              grid=".rama"+rama+"{display: grid;grid-template-columns: repeat("+rama+", 1fr)}";

              $('#estilos').append(
                '.arbol2{'+
                'display: grid;grid-template-columns: repeat('+nivel1+', 1fr);'+
                '}'+
              '');
              console.log(response);
            }
          });
        }
      }
    });


    vuejs.actualizar();



  </script>
</html>
