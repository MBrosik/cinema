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

      <main class="screening-site">
         <?php
         include("../src/php/utils/db.php");
         include("../src/php/utils/functions.php");

         $connection = mysqli_connect($host, $user, $passwd, $dbname);

         // $stmt = mysqli_prepare($connection, "SELECT movie_screenings.id as id, films.name as film_name, films.img_src as img_src, movie_screenings.Date as Date
         // FROM movie_screenings
         // INNER JOIN films 
         // ON movie_screenings.film = films.id  
         // WHERE film=?");

         // mysqli_stmt_bind_param($stmt, "s", $_GET["film"],);
         // mysqli_stmt_execute($stmt);

         // $result = $stmt->get_result();
         // $screenings = mysqli_fetch_all($result, MYSQLI_ASSOC);

         $screenings = select_bind(
            $connection,
            "SELECT movie_screenings.id as id, films.name as film_name, films.img_src as img_src, movie_screenings.Date as Date
            FROM movie_screenings
            INNER JOIN films 
            ON movie_screenings.film = films.id  
            WHERE film=?",
            "s",
            $_GET["film"],
         );

         $films = select_bind(
            $connection,
            "SELECT * FROM films WHERE id = ?",
            "i",
            $_GET["film"],
         );

         // echo "<pre>";
         // var_dump($screenings);
         // echo "</pre>";

         ?>
         <div class="title-container">
            <img src="<?php echo  $films[0]["img_src"] ?>" alt="">
            <div class="title"><?php echo  $films[0]["name"] ?></div>
         </div>

         <div class="screenings-container">
            Dostępne seanse:
            <?php foreach ($screenings as $key => $value) { ?>

               <div class="screening">
                  <a href="../seat_reservation/?id=<?php echo $value["id"] ?>" class="time"><?php echo $value["Date"] ?></a>
               </div>

            <?php } ?>
         </div>

      </main>
   </div>
</body>

</html>