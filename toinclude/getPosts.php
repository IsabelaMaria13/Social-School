<?php
    include 'dbh_inc.php';
    $info = ""; $textErr = ""; $x = 0;
    $username = $_SESSION['us_username'];
    $school = $_SESSION['us_school'];
    if(isset($_POST["post_info"])){
      header("Location: ../php/schoolmanager.php ");
      if(empty($_POST['text'])){
        $textErr = "POST is required";
        $x++;
      }
      else {
        $info = mysqli_real_escape_string($conn, $_POST['text']);
      }

      if($x == 0){
        $sql = "INSERT INTO posts (post_info,user,user_school) VALUES ('$info','$username', '$school');";
        mysqli_query($conn, $sql);
        }
      }

      $sql = "SELECT * FROM posts WHERE user='$username'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
?>
