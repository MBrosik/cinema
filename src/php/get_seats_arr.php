<?php
include("./utils/db.php");
include("./utils/functions.php");

session_start();

$json = file_get_contents('php://input');
$data = json_decode($json, true);


$connection = mysqli_connect($host, $user, $passwd, $dbname);

// ------------------------------------
// get seats
// ------------------------------------

$stmt = mysqli_prepare($connection, "SELECT * FROM reserved INNER JOIN seats ON seats.id = reserved.seat_id WHERE movie_screening_id=?");
mysqli_stmt_bind_param($stmt, "s", $data["film_id"],);
mysqli_stmt_execute($stmt);

$result = $stmt->get_result();
$seats = mysqli_fetch_all($result, MYSQLI_ASSOC);

// ------------------------------------
// set max Values
// ------------------------------------

$maxRows = 15;
$maxColumns = 20;

// ------------------------------------
// fill array
// ------------------------------------

$table = array_fill(0, $maxRows, array_fill(0, $maxColumns, array(
   "yourSeat" => false,
   "reserved" => false,
)));

foreach ($seats as $key => $value) {
   if (isset($_SESSION["id"])){
      $table[$value["row_number"]][$value["column_number"]]["yourSeat"] = $value["user"] == $_SESSION["id"];
   }
   $table[$value["row_number"]][$value["column_number"]]["reserved"] = true;
}


// echo json_encode($seats);
echo json_encode(array("table" => $table, "mode" => isset($_SESSION["id"])));
