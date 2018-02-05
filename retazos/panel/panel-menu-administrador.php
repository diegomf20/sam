<div class="menu">
  <div class="menu-logo">
    <h1 class="logo-momentaneo">SAM</h1>
  </div>
  <div class="menu-avatar">
    <div class="avatar-separe">
      <div class="avatar-imagen">
        <img class="img-avatar" src="../vendor/img/usuario.jpg">
      </div>
      <div class="avatar-datos">
        <h4 class="centrar"><?php echo $administrador['nombres'] ?></h4>
      </div>
    </div>
  </div>
  <div class="menu-opciones">
    <ul>
      <li class=<?php if($pagina=="PAGO INICIAL") echo "activo";?>>
        <a href="pago-inicial.php">
          <i class="fa fa-ticket"></i>
          <p>PAGO INICIAL</p>
        </a>
      </li>
      <li class=<?php if($pagina=="INVERSION INICIAL") echo "activo";?>>
        <a href="inversion-inicial.php">
          <i class="fa fa-bar-chart"></i>
          <p>INVERSION INICIAL</p>
        </a>
      </li>
      <li class=<?php if($pagina=="INVERSION RENOVACIÓN") echo "activo";?>>
        <a href="inversion-renovacion.php">
          <i class="fa fa-bar-chart"></i>
          <p>INVERSION RENOVACIÓN</p>
        </a>
      </li>
      <li class=<?php if($pagina=="DEPOSITOS PENDIENTES") echo "activo";?>>
        <a href="depositos-pendientes.php">
          <i class="fa fa-bar-chart"></i>
          <p>DEPOSITOS PENDIENTES</p>
        </a>
      </li>
      <li class=<?php if($pagina=="CLIENTES") echo "activo";?>>
        <a href="clientes.php">
          <i class="fa fa-address-book-o"></i>
          <p>CLIENTES</p>
        </a>
      </li>
    </ul>
  </div>
</div>
