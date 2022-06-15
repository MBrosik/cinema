<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../src/scss/login/style.css">
</head>

<body>
   <div id="container">

      <?php
      // --------------
      // actions
      // --------------
      session_start();

      if(isset($_GET['action'])){
         if($_GET['action'] == "registered"){
            echo "<h1 id='information'>Teraz się zaloguj</h1>";
         }
         else if($_GET["action"] == "notExists"){
            echo "<h1 id='warning'>Dany login nie istnieje lub hasło jest nieprawidłowe</h1>";
         }
      }

      if(isset($_SESSION["id"])){
         header("Location: ../main_page");
      }

      ?>


      <h1>Zaloguj się</h1>
      <form id="login-form" action="../src/php/login.php" method = "GET">
         <label for="login">login:</label>
         <input id="login" type="text" name="login">
         
         <label for="password">password:</label>
         <input id="password" type="password" name="password">

         <button type="submit">Potwierdź</button>
         <a href="../register">Zarejestruj się</a>
      </form>
   </div>
</body>

</html>