<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <title> Social School Official </title>
  <meta charset="utf-8"> </meta>
  <link rel="stylesheet" href="../css/homestyleresponsivon.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
  <header>
    <?php
    if(isset($_SESSION['us_username'])){
      echo '<a href="../php/logout.php"> <input id="lobutt" type="submit" name="logout" value="LOGOUT"> </a>';
    }
    ?>
  </header>
  <div id="mainbackground">
    <div class="containerheader">
      <h1> Social School </h1>
      <p> We hope that this project will help your school </p>
      <p> to be more organised, more interesting and more interactive. </p>
      <br>
      <?php
      if(!isset($_SESSION['us_username'])){
        echo '<a href="../php/login.php"> <button class="button"> <span> LOGIN </span> </button> </a>
        <a href="../php/signup.php"> <button class="button"> <span>SIGNUP</span> </button> </a>';
      }
      ?>
    </div>
    <div class="fill"></div>
  </div>
</body>
<footer>
  <div class="footerfill"> </div>
  <div class="containerfooter">
    <div id="copyright"> Copyright &#169; edus.project2018 </div>
  </div>
</footer>
</html>
