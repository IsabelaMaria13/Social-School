<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <title> SignIn - Social Shool </title>
  <meta charset="utf-8"> </meta>
  <link rel="stylesheet" href="../css/loginstyleresponsivo.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <style>
  .error {color: #FF0000; font-family: Lato; font-size: 13px; font-style: italic;}
  </style>
</head>

<body>
  <div> <img id="background">
  </div>
  <?php include '../toinclude/loginsystem.php'?>
  <div class="container">
    <div class="square">
      <div class="squarecontent">
        <h1> LOGIN </h1>
        <p> Don't you have an accout, yet? <a href="../php/signup.php"> SIGNIN </a> </p> <br>
        <form class="form" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="text" name="username" placeholder="Username" value="">
          <span class="error"> <br> <?php echo $usnErr;?></span> <br>
          <input type="password" name="password" placeholder="Password" value="">
          <span class="error"> <br> <?php echo $psdErr;?></span> <br>
          <br>
          <input type="submit" name="login" value="LOGIN">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
