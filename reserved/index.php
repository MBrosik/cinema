<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <link rel="stylesheet" href="../src/scss/main/style.css">
</head>

<body>
   <div id="container">
      <?php
      session_start();
      include("../src/Components/header.php")
      ?>

      <main class="reserved-seats">
         <?php
         include("../src/php/utils/db.php");
         include("../src/php/utils/functions.php");

         $connection = mysqli_connect($host, $user, $passwd, $dbname);

         $arr = select_bind(
            $connection,
            "SELECT 
               reserved.id AS id, 
               reserved.user AS user, 
               reserved.movie_screening_id AS movie_screening_id, 
               films.name AS film_name,
               movie_screenings.Date AS Date,               
               seats.column_number AS column_number,
               seats.row_number
            FROM reserved
            INNER JOIN  movie_screenings
            ON reserved.movie_screening_id = movie_screenings.id 
            INNER JOIN films
            ON movie_screenings.film = films.id
            INNER JOIN seats 
            ON seats.id = reserved.seat_id
            WHERE user=?",
            "i",
            $_SESSION["id"]
         );

         // $grouped_arr = array_group_by($arr, fn ($el) => $el["movie_screening_id"]);         
         $grouped_arr = array_group_by($arr, function($el){
            return $el["movie_screening_id"];
         });         
         ?>

         <div class="reserved-container">
            <?php foreach ($grouped_arr as $key => $value) { ?>
               <div class="film-content">
                  <div class="film-name">                     
                     <div><?php echo $value[0]["film_name"] ?> </div>
                     <div><?php echo $value[0]["Date"] ?></div>
                  </div>
                  <div class="seats-container">
                     <div class="seat-title">
                        <div>id</div>
                        <div>column</div>
                        <div>row</div>
                     </div>
                     <?php foreach ($value as $key => $value1) { ?>
                        <div class="seat">
                           <div><?php echo $key ?></div>
                           <!-- <div>column: </div> -->
                           <div><?php echo $value1["column_number"] ?></div>
                           <!-- <div>row: </div> -->
                           <div><?php echo $value1["row_number"] ?></div>
                        </div>
                     <?php } ?>
                  </div>
                  <div class="button-container">
                     <a href="../seat_reservation/?id=<?php echo $value1["movie_screening_id"] ?>">Edytuj</a>
                  </div>
               </div>
            <?php } ?>
         </div>
      </main>
   </div>
</body>

</html>