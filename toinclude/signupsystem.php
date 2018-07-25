<?php
$fnameErr = $lnameErr = $usnErr = $psdErr = $emailErr = $grdErr = $utypeErr = $schErr = $studentschErr = "";
$firstname = $lastname = $username = $password = $eMail = $grade = $utype = $school = $studentschool = "";
$x=0; $verify=0;
if(isset($_POST['signup'])){
  include_once 'dbh_inc.php';

  if(empty($_POST['frstname'])){
    $fnameErr = "First Name is required";
    $x++;
  }
  else {
    $firstname = mysqli_real_escape_string($conn, $_POST['frstname']);
  }

  if(empty($_POST['lstname'])){
    $lnameErr = "Last Name is required";
    $x++;
  }
  else {
    $lastname = mysqli_real_escape_string($conn, $_POST['lstname']);
  }

  if(empty($_POST['usn'])){
    $usnErr = "Username is required";
    $x++;
  }
  else {
    $username = mysqli_real_escape_string($conn, $_POST['usn']);
  }

  if(empty($_POST['psswrd'])){
    $psdErr = "Password is required";
    $x++;
  }
  else {
    $password = mysqli_real_escape_string($conn, $_POST['psswrd']);
  }

  if(empty($_POST['e-mail'])){
    $emailErr = "Email is required";
    $x++;
  }
  else{
    $eMail = mysqli_real_escape_string($conn, $_POST['e-mail']);
    if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Invalid email. Re-enter the email.";
    $x++;
    }
  }

  if(empty($_POST['utype'])){
    $utypeErr = "User Type is required";
    $x++;
  }
  else {
    $utype = mysqli_real_escape_string($conn, $_POST['utype']);
  }

  if($utype == "Student"){
    if(empty($_POST['grd'])){
      $grdErr = "Your grade is required";
      $x++;
    }
    else{
      $grade = mysqli_real_escape_string($conn, $_POST['grd']);
    }
  }
  else {
    $grade = "";
  }

  if($utype == "Student"){
    if(empty($_POST['studentschool'])){
      $studentschErr = "Your school is required";
      $x++;
    }
    else{
      $studentschool = mysqli_real_escape_string($conn, $_POST['studentschool']);
    }
  }

  if($utype == "School_Manager"){
    if(empty($_POST['school'])){
      $schErr = "School is required";
      $x++;
    }
    else {
      $school = mysqli_real_escape_string($conn, $_POST['school']);
    }
  }
  else {
    $school = "";
  }

  if($utype == "Student"){
    $sql = "SELECT * FROM users WHERE user_school='$studentschool'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 0){
      $studentschErr = "This school doesn't exist in our database";
      $x++;
    }
  }
  else{
    $sql = "INSERT INTO users (user_school) VALUE ('$studentschool');";
    mysqli_query($conn, $sql);
  }

  if($x == 0){
    $sql = "SELECT * FROM users WHERE user_username='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
      $usnErr = "Username already taken";
    }

    $emailsql = "SELECT * FROM users WHERE user_email='$eMail'";
    $resultem = mysqli_query($conn, $emailsql);
    $resultCheck2 = mysqli_num_rows($resultem);
    if($resultCheck2 > 0){
      $emailErr = "Email already taken";
    }
    else{
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (user_firstname, user_lastname, user_username, user_password, user_email, user_type, user_school, user_classgrade) VALUES ('$firstname', '$lastname', '$username', '$hashed', '$eMail', '$utype', '$school', '$grade');";
      mysqli_query($conn, $sql);
      header("Location: ../php/signup.php?=succes");
    }
  }
}
?>
