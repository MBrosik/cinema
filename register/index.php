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

      session_start();
      
      if (isset($_GET["action"])){
         echo "<h1 id='warning'>Dany login jest już zajęty</h1>";
      }

      if(isset($_SESSION["id"])){
         header("Location: ../main_page");
      }
      ?>
      <h1>Zarejestruj się</h1>
      <form id="login-form" action="../src/php/register.php" method="GET">
         <label for="login">login:</label>
         <input id="login" type="text" name="login">

         <label for="password">password:</label>
         <input id="password" type="password" name="password">

         <label for="phone">phone:</label>
         <input id="phone" type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="np. 435-910-309">

         <button type="submit">Potwierdź</button>
         <a href="../login">Zaloguj się</a>
      </form>
   </div>
</body>

</html>