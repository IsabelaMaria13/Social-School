<?php

$usnErr = $psdErr = "";
$username = $password = "";
$checkvar = 0;
include 'dbh_inc.php';
if(isset($_POST['login'])){
  if(empty($_POST['username'])){
    $usnErr = "This field is important! Please complete this field!";
    $checkvar++;
  }
  else{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
  }

  if(isset($_POST['login'])){
    if(empty($_POST['password'])){
      $psdErr = "This field is important! Please complete this field!";
      $checkvar++;
    }
    else{
      $password = mysqli_real_escape_string($conn, $_POST['password']);
    }
  }

  if($checkvar == 0){
    $sql = "SELECT * FROM users WHERE user_username='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1){
      $usnErr = "Username not found";
    }
    else{
      if($row = mysqli_fetch_assoc($result)){
        $hashedPwdCheck = password_verify($password, $row['user_password']);
        if($hashedPwdCheck == false){
          $psdErr = "Wrong Password! Please re-enter your personal data.";
        }
        elseif($hashedPwdCheck == true){
          $_SESSION['us_username'] = $row['user_username'];
          $_SESSION['us_first'] = $row['user_firstname'];
          $_SESSION['us_last'] = $row['user_lastname'];
          $_SESSION['us_email'] = $row['user_email'];
          $_SESSION['us_type'] = $row['user_type'];
          $_SESSION['us_grade'] = $row['user_classgrade'];
          $_SESSION['us_school'] = $row['user_school'];

          if($_SESSION['us_type'] == 'School_Manager')
            header("Location: ../php/schoolmanager.php");
          else
            header("Location: ../php/student.php");
        }
      }
    }
  }
}


?>
