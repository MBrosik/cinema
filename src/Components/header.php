<header>
   <a href="../main_page">
      <img src="../src/img/logo.png" alt="">
   </a>
   <a href="../repertoire">Repertuar</a>

   <?php if (isset($_SESSION["id"])) { ?>
      <a href="../reserved">Zarezerwowane</a>
   <?php } else { ?>
      <div></div>
   <?php } ?>

   <div></div>

   <?php
   if (isset($_SESSION["id"])) {
      if ($_SESSION["id"] == 0) { ?>
         <a href="../admin">admin cockpit</a>
      <?php } else { ?>
         <div><?php echo $_SESSION["login"] ?></div>
      <?php } ?>
   <?php } else { ?>
      <div></div>
   <?php } ?>


   <?php if (isset($_SESSION["id"])) { ?>
      <a href="../src/php/logout.php">Wyloguj się</a>
   <?php } else { ?>
      <a href="../login">Zaloguj się</a>
   <?php } ?>

</header>