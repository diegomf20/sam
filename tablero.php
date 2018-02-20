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
      .rama{
        position: relative;
      }
      .rama:before{
        content: "a";
        display: block;
        color: transparent;
        height: 30px;
        border-top: 2px dashed #2489c5;
        margin-bottom: 0;
      }

      .rama:first-child:before{
        content: "a";
        display: block;
        color: transparent;
        height: 30px;
        width: 50%;
        margin-left: 50%;
        border-top: 2px dashed #2489c5;
        border-left: 2px dashed #2489c5;
        border-top-left-radius: 15px;
        margin-bottom: 0;
      }
      .rama:last-child:before{
        content: "a";
        display: block;
        color: transparent;
        height: 30px;
        width: 50%;
        margin-right: 50%;
        border-top: 2px dashed #2489c5;
        border-right:  2px dashed #2489c5;
        border-top-right-radius: 15px;
        margin-bottom: 0;
      }
      .rama:after {
          margin-left: calc(50% - 1px);
          top: 0;
          position: absolute;
          content: "a";
          color: transparent;
          display: block;
          width: 30px;
          height: 30px;
          border-left: 2px dashed #2489c5;
      }
      .rama:first-child:after,.rama:last-child:after,.rama:only-child:after{
        border: none;
      }
      .rama:only-child:before{
        content: "a";
        display: block;
        color: transparent;
        height: 30px;
        width: 50%;
        margin-left: 50%;
        border-top:0px;
        border-left: 2px dashed #2489c5;
        border-right: 0px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        margin-bottom: 0;
      }
      .arbol-img-lg{
        background-position: center center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-size: 100% auto;
        background-repeat: no-repeat;
        margin-right: auto;
        margin-left: auto;
        border:3px solid #2489c5;
      }
      .arbol h6{
        font-size: 12px
      }
      .arbol-img-sm{
        position: relative;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100% auto;
        background-repeat: no-repeat;
        margin-right: auto;
        margin-left: auto;
        border:3px solid #2489c5;
      }
      .arbol-img-oculto:before{
        content: " ";
        top: 30px;
        left: 0;
        width: 60px;
        height: 60px;
        position: absolute;
        background-color: rgba(100,100,100,0.5);
        margin-left: calc( (100% - 60px)/2 );
        margin-right: 50px;
        border-radius: 50%;
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
                      <h2>{{totalRetiros}}</h2>
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
                      <h2><?php echo $inversionista['cuotaretirada'] ?></h2>
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
            <div class="col-sm-12 centrar">
              <div class="tarjeta negro">
                <div class="body">
                  <div  class="rama0 centrar">
                    <div class="arbol">
                        <div class="arbol-img-lg" style="background-image: url(imagenes/<?php echo $inversionista['imagen']?>)"></div>
                        <div class="arbol-nombre">
                          <h6><?php echo $inversionista['nombres'] ?></h6>
                        </div>
                    </div>
                  </div>
                  <div class="rama1">
                    <div class="rama"  v-for="arboles in arbol">
                      <div class="arbol">
                          <div class="arbol-img-lg" :style="{ 'background-image': 'url( imagenes/' + arboles.imagen + ')' }"></div>
                          <div class="arbol-nombre">
                            <h6>{{arboles.nombres}}</h6>
                          </div>
                      </div>
                      <div :class="'rama'+ arboles.idafiliado ">
                        <div class="rama" v-for="arboles2 in arboles.arbol">
                          <div class="arbol">
                              <div class="arbol-img-sm" :style="{ 'background-image': 'url( imagenes/' + arboles2.imagen + ')' }"></div>
                              <div class="arbol-nombre">
                                <h6>{{arboles2.nombres}}</h6>
                              </div>
                          </div>
                          <div :class="'rama'+ arboles2.idafiliado ">
                            <div class="rama" v-for="arboles3 in arboles2.arbol">
                              <div class="arbol">
                                  <div class="arbol-img-sm" :style="{ 'background-image': 'url( imagenes/' + arboles3.imagen + ')' }"></div>
                                  <div class="arbol-nombre">
                                    <h6>{{arboles3.nombres}}</h6>
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
    <?php
      if($inversionista['banco']==null){
    ?>
      alertify.alert("SAM","Faltan datos bancarios. Dar click en OK para ir...", function(){
          alertify.success('REDIRECIONANDO ...');
          setTimeout(function () {
              location.href='datos.php';
          }, 2000);
        });
    <?php
      }
     ?>


    function  abrir(){
      $('#btn1').click();
    }

    abrir();
    var vuejs=new Vue({
      el:'#app',
      data:{
        arbol:[],
        tabla:[]
      },
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
      methods: {
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
        },
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
                var ramaNivel2;
                var obj=vuejs.arbol[i];
                id=obj.idafiliado;
                ramaNivel2=obj.arbol.length;
                grid=".rama"+id+"{display: grid;grid-template-columns: repeat("+ramaNivel2+", 1fr)}";
                $('#estilos').append(grid);
                for (var j = 0; j < ramaNivel2; j++) {
                    var obj2=obj.arbol[j];
                    id=obj2.idafiliado;
                    var ramaNivel3=obj2.arbol.length;
                    grid=".rama"+id+"{display: grid;grid-template-columns: repeat("+ramaNivel3+", 1fr)}";
                    $('#estilos').append(grid);
                }
              }
              console.log(response);
            }
          });
        },
        faltaRenovar:function(event){
          $.ajax({
            url: 'app/control/c-alerta.php',
            type:'POST',
            data:{operacion:"diasRenovacion"},
            success: function(response){
              if (response!="no") {
                if ((Number(response)+1)>=0) {
                  alertify.alert("SAM","Usted Tiene "+(Number(response)+1)+" dias para renovar!", function(){});
                }else {
                  alertify.alert("SAM","Su plazo de reinversi贸n a caducado. Contactese con la empresa!", function(){});
                }
              }
            }
          });
        }
      }
    });
    vuejs.listar();
    vuejs.faltaRenovar();
    vuejs.actualizar();
  </script>
</html>
