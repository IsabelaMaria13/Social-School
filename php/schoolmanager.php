<?php 
  session_start();
  $upload = false; 
  $fisier = "";
?>
<!DOCTYPE html>
<html>
<head>
  <title> School Manager - Social School </title>
  <meta charset="utf-8"> </meta>
  <link rel="stylesheet" href="../css/schoolmanagerresponsive.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<header >
  <div class="headercontainer">
    <div> <img id="logo" src="../resources/Logo/logo official.png"> </div>
    <div class="php">
      <?php
        $usn = $_SESSION['us_username'];
        echo '<div class="session"> ' .$usn. ' <a href="../php/logout.php"> <input id="lobutt" type="submit" name="logout" value="LOGOUT"> </a> </div>';
      ?>
    </div>
  </div>
</header>


<body style='background-image: url("../resources/poza.jpg");'>
  <div class="uploadphoto"> </div>
  <div class="buttonarea">
  
  <form action="uploads.php" method='POST' enctype="multipart/form-data">
        <input type='file' name='file'>
        <button type='submit' class='button' name='submit'><span>UPLOAD</span></button>  
      </form>

  
    
  </div>
  <div class="border"> </div>
  <div class="container">
    <div class="infobox">
      <div class="infoboxcontainer">
        <h1> Profile info <h1>
        <div class="info">
          <p class="pgpadd"> School Name: <?php echo $_SESSION['us_school'] ?> </p>
          <p class="pgpadd"> School Manager: <?php echo $_SESSION['us_username'] ?> </p>
          <p class="pgpadd"> School Manager Contact: <?php echo $_SESSION['us_email'] ?> </p>
          <p class="pgpadd"> User Type: <?php echo $_SESSION['us_type'] ?> </p>
        </div>
      </div>
    </div>
    <?php include '../toinclude/getPosts.php'?>
    <div class="postbox">
      <div class="postboxcontainer">
        <h1> News Feed Editor <h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <textarea name="text" placeholder="Type your text here..." value=""></textarea>
          <input type="submit" name="post_info" value="POST"></input>
        </form>
      </div>
    </div>
    <div class="poststimeline">
      <?php
      if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='post'> <div class='poststext'>". $row["post_info"]."</div> </div>";
        }
      }
      ?>
    </div>
  </div>
</body>
</html>
