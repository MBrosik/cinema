<?php
include("./utils/db.php");
include("./utils/functions.php");

if (isset($_GET["login"], $_GET["password"], $_GET["phone"])) {
   if (preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/', $_GET["phone"])) {
      $connection = mysqli_connect($host, $user, $passwd, $dbname);

      // ----------
      // get users
      // ----------
      $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE login = ?");
      mysqli_stmt_bind_param($stmt, "s", $_GET["login"],);
      mysqli_stmt_execute($stmt);

      $result = $stmt->get_result();
      $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

      if (count($users) != 0) {
         header("Location: ../../register/?action=exist");
      } else {
         $stmt = mysqli_prepare($connection, "INSERT INTO users(login,password,phone) VALUES(?, md5(?), ?) ");
         mysqli_stmt_bind_param($stmt, "sss", $_GET["login"], $_GET["password"], $_GET["phone"]);
         mysqli_stmt_execute($stmt);

         header("Location: ../../login/?action=registered");
      };
   }
}
