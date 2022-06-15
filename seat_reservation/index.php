<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <link rel="stylesheet" href="../src/scss/main/style.css">

   <script type="module" src="./index.js"></script>
</head>

<body>
   <div id="container">
      <?php
      session_start();
      include("../src/Components/header.php")
      ?>

      <main class="seat-reservation">
         <?php
         include("../src/php/utils/db.php");
         include("../src/php/utils/functions.php");

         $connection = mysqli_connect($host, $user, $passwd, $dbname);

         $stmt = mysqli_prepare($connection, "SELECT movie_screenings.id as id, films.name as film_name, films.img_src as img_src, movie_screenings.Date as Date
         FROM movie_screenings
         INNER JOIN films 
         ON movie_screenings.film = films.id  
         WHERE movie_screenings.id=?");

         mysqli_stmt_bind_param($stmt, "s", $_GET["id"],);
         mysqli_stmt_execute($stmt);

         $result = $stmt->get_result();
         $screenings = mysqli_fetch_all($result, MYSQLI_ASSOC);

         ?>
         <div class="title-container">
            <img src="<?php echo $screenings[0]["img_src"] ?>" alt="">
            <div class="title"><?php echo $screenings[0]["film_name"] ?></div>
         </div>

         <div class="seats-container"></div>
         <?php if (isset($_SESSION["id"])) { ?>
            <div class="button-container">
               <button>Potwierdź</button>
            </div>
         <?php } ?>
      </main>
   </div>
</body>

</html>