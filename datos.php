<?php
  $pagina='DATOS';
  include 'retazos/generales/session.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <title>SAM-<?php echo $pagina ?></title>
  <!--scripts y css generales-->
  <?php include 'retazos/generales/css.php'; ?>
  <!--fin scripts y css generales-->
  <link rel="stylesheet" href="vendor/css/avatar.css">
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
            <div class="col-xl-4 col-sm-3">

            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="tarjeta">
                <div class="header">
                  AVATAR
                </div>
                <div class="body">
                  <div class="avatar">
                    <div id="img-avatar" class="imagen" style="background-image: url(imagenes/<?php echo $inversionista['imagen']?>)">

                    </div>
                    <form method="post" id="formulario" enctype="multipart/form-data">
                      <input type="file" name="file" id="foto">
                    </form>
                    <button id="actualizar" class="boton boton-subir"><i class="fa fa-upload"></i> SUBIR</button>
                    <button id="guardar" class="boton boton-guardar"><i class="fa fa-save"></i> GUARDAR</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-3">

            </div>
            <div class="col-xl-12 ">
              <div class="tarjeta">
                <div class="header">
                  INFORMACIÓN DE USUARIO
                </div>
                <div class="body">
                  <div class="row">
                    <label class="col-xl-1 col-sm-2 control">E-mail:</label>
                    <div class="col-xl-4 col-sm-5">
    										<input id="correo" type="text" disabled class="control" value="<?php echo $inversionista['email']?>" placeholder="Ingresar E-mail">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">Contraseña:</label>
                    <div class="col-xl-3 col-sm-3">
    										<input id="contrasenia" type="password" class="control" value="<?php echo $inversionista['contrasenia']?>" placeholder="Ingresar Contraseña">
    								</div>
                    <div class="col-xl-3 col-sm-4 col-6">
                      <button id="guardar1" class="control boton-default">GUARDAR</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  DATOS PERSONALES
                </div>
                <div class="body">
                  <div class="row">
                    <label class="col-xl-1 col-sm-2 control">Nombres:</label>
                    <div class="col-xl-3 col-sm-4">
    										<input id="nombres" type="text" class="control" value="<?php echo $inversionista['nombres']?>" placeholder="Ingresar Nombres">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">Apellidos:</label>
    								<div class="col-xl-3 col-sm-4">
    										<input id="apellidos" type="text" class="control" value="<?php echo $inversionista['apellidos']?>" placeholder="Ingresar Apellidos">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">DNI:</label>
                    <div class="col-xl-3 col-sm-4">
    										<input id="dni" type="text" class="control" value="<?php echo $inversionista['dni']?>" placeholder="DNI">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">Celular:</label>
    								<div class="col-xl-3 col-sm-4">
    										<input id="celular" type="text" class="control" value="<?php echo $inversionista['celular']?>" placeholder="Ingresar Celular">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">Calle:</label>
    								<div class="col-xl-7 col-sm-10">
    										<input id="direccion" type="text" class="control" value="<?php echo $inversionista['direccion']?>" placeholder="Ingresar direccion">
    								</div>
                    <label class="col-xl-1 col-sm-2 control">Ciudad:</label>
    								<div class="col-xl-8 col-sm-10">
    										<input id="ciudad" type="text" class="control" value="<?php echo $inversionista['ciudad']?>" placeholder="Ciudad/Distrito/Provincia/Departamento">
    								</div>
                    <div class="col-sm-4">
                      <button id="guardar2" class="control boton-default">GUARDAR</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="tarjeta">
                <div class="header">
                  INFORMACIÓN BANCARIA
                </div>
                <div class="body">
                  <div class="row">
                    <label class="col-sm-2 col-xl-1 control">Banco:</label>
                    <div class="col-sm-10 col-xl-4">
    										<input id="banco" type="text" class="control" value="<?php echo $inversionista['banco']?>" placeholder="Ingrese Nombre del Banco">
    								</div>
                    <label class="col-sm-2 col-xl-1 control">Cuenta:</label>
                    <div class="col-sm-10 col-xl-3">
    										<input id="numerocuenta" type="text" class="control" value="<?php echo $inversionista['numerocuenta']?>" placeholder="Ingrese N° de cuenta">
    								</div>
                    <div class="col-sm-4 col-xl-3">
                      <button id="guardar3" class="control boton-default">GUARDAR</button>
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
    <script type="text/javascript" src="vendor/js/datos.js"></script>
  </body>
</html>
