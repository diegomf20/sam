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
    <?php
      //https://code.tutsplus.com/es/tutorials/the-30-css-selectors-you-must-memorize--net-16048
      //


     ?>
    <style id="estilos">
      .centrar:first-child:before{
        content: "a";
        color: transparent;
        height:10px;
        border: 1px dashed #111;
      }
      .centrar:first-child:after{
        content: "a";
        position: absolute;
        color: transparent;
        display: block;
        width: 10px;
        border: 1px dashed #111;
      }
      .arbol-img-lg{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-size: 100% auto;
        background-repeat: no-repeat;
        margin-right: auto;
        margin-left: auto;
        border:3px solid #2489c5;
      }
      .arbol-img-sm{
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-size: 100% auto;
        background-repeat: no-repeat;
        margin-right: auto;
        margin-left: auto;
        border:3px solid #2489c5;
      }
      .arbol-img-lg img{width: 100%}
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
                  <div  class="rama0 centrar">
                    <div class="arbol">
                        <div class="arbol-img-lg" style="background-image: url('vendor/img/usuario.jpg')"></div>
                        <div class="arbol-nombre">
                          <h5><?php echo $inversionista['nombres'] ?></h5>
                        </div>
                    </div>
                  </div>
                  <div class="rama1">
                    <div class="centrar"  v-for="arboles in arbol">
                      <div class="arbol">
                          <div class="arbol-img-lg" style="background-image: url('vendor/img/usuario.jpg')"></div>
                          <div class="arbol-nombre">
                            <h5>{{arboles.nombres}}</h5>
                          </div>
                      </div>
                      <div :class="'rama'+ arboles.idafiliado ">
                        <div class="centrar" v-for="arboles2 in arboles.arbol">
                          <div class="arbol">
                              <div class="arbol-img-sm" style="background-image: url('vendor/img/usuario.jpg')"></div>
                              <div class="arbol-nombre">
                                <h5>{{arboles2.nombres}}</h5>
                              </div>
                          </div>
                          <div :class="'rama'+ arboles.idafiliado ">
                            <div class="centrar" v-for="arboles3 in arboles2.arbol">
                              <div class="arbol">
                                  <div class="arbol-img-sm" style="background-image: url('vendor/img/usuario.jpg')"></div>
                                  <div class="arbol-nombre">
                                    <h5>{{arboles3.nombres}}</h5>
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
              var rama=Number(vuejs.arbol.length);
              var grid='';
              grid=".rama"+id+"{display: grid;grid-template-columns: repeat("+rama+", 1fr)}";
              $('#estilos').append(grid);

              for (var i = 0; i < rama; i++) {
                var ramaNivel2
                var obj=vuejs.arbol[i];
                id=obj.idafiliado;
                ramaNivel2=obj.arbol.length;
                grid=".rama"+id+"{display: grid;grid-template-columns: repeat("+ramaNivel2+", 1fr)}";
                $('#estilos').append(grid);
              }
              console.log(response);
            }
          });
        }
      }
    });


    vuejs.actualizar();



  </script>
</html>
