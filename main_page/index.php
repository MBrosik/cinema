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

      <main class="main-page">


         <?php
         include("../src/php/utils/db.php");
         include("../src/php/utils/functions.php");

         $connection = mysqli_connect($host, $user, $passwd, $dbname);
         $result = mysqli_query($connection, "SELECT * FROM films");
         $films = mysqli_fetch_all($result, MYSQLI_ASSOC);

         foreach ($films as $key => $value) {
         ?>

            <a href="../movie_screening/?film=<?php echo $value["id"] ?>" class="film-content" data-video="<?php echo $value["video_src"] ?>">
               <img src="<?php echo $value["img_src"] ?>" alt="Nie wczytano zdjęcia">
               <div class="film-name"> <?php echo $value["name"] ?></div>
            </a>

         <?php } ?>
      </main>
   </div>
</body>

</html>