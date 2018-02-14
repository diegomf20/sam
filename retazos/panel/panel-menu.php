<div class="menu">
  <div class="menu-scroll">
    <div class="menu-logo">
      <h1 class="logo-momentaneo"><img src="vendor/img/logo.png"></h1>
    </div>
    <div class="menu-avatar">
      <div class="avatar-separe">
        <div class="avatar-imagen" style="background-image: url(imagenes/<?php echo $inversionista['imagen']?>)">
        </div>
        <div class="row avatar-datos">
          <div class="col-12">
            <h4 class="centrar"><?php echo $nombreApellidos;?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php
              $rango="";
              switch ((int)$inversionista['rango']) {
                case 0:
                  $rango="inversionista";
                  break;
                case 1:
                  $rango="ejecutivo";
                  break;
                case 2:
                  $rango="platino";
                  break;
                case 3:
                  $rango="master";
                  break;
                case 4:
                  $rango="elite";
                  break;
              }
              include 'retazos/contenido/boton-rango.php'
            ?>

          </div>
        </div>
      </div>
    </div>
    <div class="menu-opciones">
      <ul>
        <li class=<?php if($pagina=="TABLERO") echo "activo";?>>
          <a href="tablero.php">
            <i class="fa fa-bar-chart"></i>
            <p>TABLERO</p>
          </a>
        </li>
        <li class=<?php if($pagina=="DATOS") echo "activo";?>>
          <a href="datos.php">
            <i class="fa fa-user-circle-o"></i>
            <p>DATOS</p>
          </a>
        </li>
        <li class=<?php if($pagina=="EXTRACTO") echo "activo";?>>
          <a href="extracto.php">
            <i class="fa fa-calendar-check-o "></i>
            <p>EXTRACTO</p>
          </a>
        </li>
        <li class=<?php if($pagina=="NUEVO") echo "activo";?>>
          <a href="nuevo.php">
            <i class="fa fa-user-plus"></i>
            <p>NUEVO</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
