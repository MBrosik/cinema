<?php

session_start();
include("../utils/functions.php");
include("../utils/db.php");

if (
   isset($_POST["room"], $_POST["film"], $_POST["date"], $_POST["time"])
   && $_SESSION["id"] == 0
) {
   if (
      $_POST["room"] != ""
      && $_POST["film"] != ""
      && $_POST["date"] != ""
      && $_POST["time"] != ""
   ) {
      $connection = mysqli_connect($host, $user, $passwd, $dbname);
      $date = $_POST["date"];
      $time = $_POST["time"];

      $search = select_bind(
         $connection,
         "SELECT 
         * 
         FROM movie_screenings 
         INNER JOIN films ON films.id = movie_screenings.film
         WHERE cast(? as DateTime) BETWEEN movie_screenings.Date and movie_screenings.Date + INTERVAL films.duration MINUTE
         AND screening_room = ?",
         "ss",
         "$date $time:00",
         $_POST["room"]
      );

      // var_dump($search);

      if (count($search) == 0) {
         sql_bind(
            $connection,
            "INSERT INTO movie_screenings(film, screening_room, Date) VALUES(?,?,?)",
            "sss",
            $_POST["film"],
            $_POST["room"],
            "$date $time:00"
         );
         header("Location: ../../../admin");
      } else {
         header("Location: ../../../admin/?reason=true");
      }
   }
   else{
      header("Location: ../../../admin");
   }
}
