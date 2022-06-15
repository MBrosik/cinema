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
      if (!isset($_SESSION["id"]) || $_SESSION["id"] != 0) {
         header("Location: ../main_page");
      }

      include("../src/Components/header.php");
      include("../src/php/utils/functions.php");
      include("../src/php/utils/db.php");


      $connection = mysqli_connect($host, $user, $passwd, $dbname);
      // select_bind(
      //    $connection,
      //    "SELECT 
      //     * 
      //    FROM movie_screenings
      //    INNER JOIN films
      //    ON movie_screenings.film = films.id
      //    INNER JOIN screening_rooms
      //    ON movie_screenings.screening_room = screening_rooms.id",
      //    "s"
      // );

      $result = mysqli_query($connection, "SELECT * FROM  films");
      $films = mysqli_fetch_all($result, MYSQLI_ASSOC);


      $result = mysqli_query($connection, "SELECT * FROM  screening_rooms");
      $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
      ?>

      <main class="admin-site">
         <!-- Create new room -->
         <form method="POST" action="../src/php/admin/new_room.php" class="new-room">
            <h1> Utwórz nowy pokój</h1>            
            <button type="submit"> Zatwierdź </button>
         </form>

         <!-- Create new film -->

         <form method="POST" action="../src/php/admin/new_film.php" class="new-film">
            <h1>Utwórz nowy film</h1>
            <label for="film_name"> Nazwę filmu: </label>
            <input id="film_name" name="film_name" type="text">

            <label for="img_src"> Link do zdjęcia: </label>
            <input id="img_src" name="img_src" type="text">
            <!-- <div class="button-container"> <button type="submit"> Zatwierdź </button> </div> -->
            <button type="submit"> Zatwierdź </button>
         </form>

         <!-- Create new screening-->
         <form method="POST" action="../src/php/admin/new_screening.php" class="new-screening">
            <?php if (isset($_GET["reason"])) { ?>
               <h1 class="warning"> Dana sala nie jest wolna o podanej godzinie!</h1>
            <?php } ?>
            <h1> Utwórz nowy seans</h1>

            <label for="room">Sala:</label>
            <select name="room" id="room">
               <?php foreach ($rooms as $key => $room) { ?>
                  <option value="<?php echo $room["id"] ?>"><?php echo $room["id"] ?></option>
               <?php } ?>
            </select>

            <label for="film">Film:</label>
            <select name="film" id="film">
               <?php foreach ($films as $key => $film) { ?>
                  <option value="<?php echo $film["id"] ?>"><?php echo $film["name"] ?></option>
               <?php } ?>
            </select>

            <label for="date">Data:</label>
            <input type="date" name="date" id="date">

            <label for="time">Czas:</label>
            <input type="time" name="time" id="time">
            <!-- <select name="time" id="time"> -->
               <?php
               // $table = [
               //    "8:00", "10:30", "13:30", "15:30", 
               // ];
               // foreach ($table as $key => $value) {                  
               ?>
               <!-- <option value="<?php echo $value ?>"> <?php echo $value ?></option>                -->
               <?php
               // } 
               ?>
            <!-- </select> -->

            <button type="submit"> Zatwierdź </button>
         </form>

         <script>
            document.getElementById("date").oninput = (e) => {
               console.log(e.target.value)
            }
         </script>
      </main>
   </div>
</body>

</html>