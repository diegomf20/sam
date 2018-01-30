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
      <li class=<?php if($pagina=="INVERSIONES") echo "activo";?>>
        <a href="inversiones.php">
          <i class="fa fa-bar-chart"></i>
          <p>INVERSIONES</p>
        </a>
      </li>
    </ul>
  </div>
</div>
