<?php

// TODO --------------------------
// TODO set more protection
// TODO --------------------------


include("./utils/db.php");
include("./utils/functions.php");

session_start();

$json = file_get_contents('php://input');
$data = json_decode($json, true);


$connection = mysqli_connect($host, $user, $passwd, $dbname);

// ------------------------------------
// get seats
// ------------------------------------

$seats = select_bind($connection, "SELECT * FROM reserved INNER JOIN seats ON reserved.seat_id = seats.id WHERE reserved.movie_screening_id=?", "s", $data["film_id"]);

// ------------------------------------
// set max Values
// ------------------------------------

$maxRows = 15;
$maxColumns = 20;


// ------------------------------------
// change values
// ------------------------------------



foreach ($seats as $key => $value) {
   $column = $value["column_number"];
   $row = $value["row_number"];

   if ($data["seats"][$row][$column]["reserved"] == false) {
      sql_bind(
         $connection,
         "DELETE reserved 
         FROM reserved 
         INNER JOIN seats 
         ON seats.id = reserved.seat_id 
         WHERE reserved.movie_screening_id=? AND seats.column_number=? AND seats.row_number=?",
         "iii",
         $data["film_id"],
         $column,
         $row
      );
   }
}

for ($x = 0; $x < $maxRows; $x++) {
   for ($y = 0; $y < $maxColumns; $y++) {
      $seat = $data["seats"][$x][$y];

      if ($seat["mySeat"] && $seat["reserved"]) {
         $seats1 = select_bind(
            $connection,
            "SELECT * 
            FROM reserved
            INNER JOIN seats 
            ON seats.id = reserved.seat_id 
            WHERE reserved.movie_screening_id=? AND seats.column_number=? AND seats.row_number=?",
            "sss",
            $data["film_id"],
            $y,
            $x
         );         

         if (count($seats1) == 0) {
            $seats2 = select_bind(
               $connection,
               "SELECT * 
               FROM seats
               WHERE column_number=? AND row_number=?",
               "ii",
               $y,
               $x
            );
            var_dump($seats2);

            sql_bind(
               $connection,
               "INSERT INTO reserved(user, movie_screening_id, seat_id) VALUES(?, ?, ?)",
               "iii",
               ...array($_SESSION["id"], $data["film_id"], $seats2[0]["id"])
            );
         }
      }
   }
}
echo "elo";