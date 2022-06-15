<?php

session_start();
include("../utils/functions.php");
include("../utils/db.php");

if (
   isset($_POST["film_name"], $_POST["img_src"])
   && $_SESSION["id"] == 0
) {
   if ($_POST["film_name"] != "" && $_POST["img_src"] != "") {

      $connection = mysqli_connect($host, $user, $passwd, $dbname);
      sql_bind(
         $connection,
         "INSERT INTO films(name, img_src) VALUES(?,?)",
         "ss",
         $_POST["film_name"],
         $_POST["img_src"]
      );
   }
   header("Location: ../../../admin");
}
