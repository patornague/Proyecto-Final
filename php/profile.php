<?php
session_start();

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <img width="300px" src="<?php echo $_COOKIE["avatar"]; ?>" alt="">
     <h1>Bienvenido <?php echo $_SESSION['user']; ?></h1>
   </body>
 </html>
