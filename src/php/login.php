<?php

include("./utils/db.php");
include("./utils/functions.php");

if (isset($_GET["login"], $_GET["password"])) {
   $connection = mysqli_connect($host, $user, $passwd, $dbname);

   // ----------
   // get users
   // ----------
   $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE login = ? AND password=md5(?)");
   mysqli_stmt_bind_param($stmt, "ss", $_GET["login"], $_GET["password"]);
   mysqli_stmt_execute($stmt);

   $result = $stmt->get_result();
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


   if (count($users) != 0) {
      session_start();
      $_SESSION["id"] = $users[0]["id"];
      $_SESSION["login"] = $users[0]["login"];

      // include("../../main_page")

      header("Location: ../../main_page");
   } else {
      header("Location: ../../login/?action=notExists");
   };
}
