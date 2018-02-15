<button type="button" name="button" class="rango rango-<?php echo $rango ?>">
  <?php echo $rango ?> <?php if ($_SESSION['renovacion']>0) {
    echo " - REN";
  } ?>
</button>
