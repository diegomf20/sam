<?php
  $pagina='INVERSIONES';
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
                  Lista de Inversionistas
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>Nombre de Inversionista</td>
                          <td>id</td>
                          <td>Estado</td>
                          <td>actualizar</td>
                          <td>paquete</td>
                        </tr>
                        <tr>
                          <td>Luis Tucunango</td>
                          <td><input id="idinversionista" class="control"></td>
                          <td>Inactivo</td>
                          <td><button id="agregar" class="control">Inversion</button></td>
                          <td><input id="paquete" class="control"></td>
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
  <script type="text/javascript">
    $('#agregar').click(function(){
      $.ajax({
        url: '../app/control/c-inversion.php',
        type:'POST',
        data:{operacion:"registrarInversion",idinversionista:$('#idinversionista').val(),paquete:$('#paquete').val()},
        success: function(response){
          if (response=='correcto') {
            alertify.success('Correcto, Ingresando ...');

          }else {
            alertify.error(response);
          }
        }
      });
    });
  </script>
</html>
