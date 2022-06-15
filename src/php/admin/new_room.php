<?php

session_start();
include("../utils/functions.php");
include("../utils/db.php");

if (
   isset($_POST["rows"], $_POST["columns"])
   && $_SESSION["id"] == 0
) {
   if ($_POST["rows"] != "" && $_POST["columns"] != "") {
      $connection = mysqli_connect($host, $user, $passwd, $dbname);

      mysqli_query($connection, "INSERT INTO screening_rooms");
      // sql_bind(
      //    $connection,
      //    "INSERT INTO screening_rooms",
      //    "ss",
      //    $_POST["rows"],
      //    $_POST["columns"]
      // );
   }
   header("Location: ../../../admin");
}
