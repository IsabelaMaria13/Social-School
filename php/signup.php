<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <title> SignIn - Social Shool </title>
  <meta charset="utf-8"> </meta>
  <link rel="stylesheet" href="../css/signupstyleresponsivo.css">
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <script src="../head/jquery-3.3.1.min.js"></script>
  <style>
  .error {color: #FF0000; font-family: Lato; font-size: 13px; font-style: italic;}
  </style>
</head>

<body>
  <div> <img id="background">
  </div>
  <?php include '../toinclude/signupsystem.php'?>
  <div class="container">
    <div class="square">
      <div class="squarecontent">
        <h1> SIGN UP </h1>
        <p> Do you already have an account? <a href="../php/login.php"> LOGIN </a> </p> <br>
        <form class="form" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="text" name="frstname" placeholder="First Name" value="">
          <span class="error"> <br> <?php echo $fnameErr;?></span> <br>
          <input type="text" name="lstname" placeholder="Last Name" value="">
          <span class="error"> <br> <?php echo $lnameErr;?></span> <br>
          <input type="text" name="usn" placeholder="Username" value="">
          <span class="error"> <br> <?php echo $usnErr;?></span> <br>
          <input type="password" name="psswrd" placeholder="Password" value="">
          <span class="error"> <br> <?php echo $psdErr;?></span> <br>
          <input type="text" name="e-mail" placeholder="Email" value="">
          <span class="error"> <br> <?php echo $emailErr;?></span> <br>
          <select name="utype" value="">
            <option value="" disabled selected hidden> User Type... </option>
            <option value="Student"> Student </option>
            <option value="School_Manager"> School Manager </option>
          </select>
          <span class="error"> <br> <?php echo $utypeErr;?></span> <br>
          <div class="hidecontent">
            <select name="grd" value="">
              <option value="" disabled selected hidden> School Grade... </option>
              <option value = "1st"> 1st </option>
              <option value = "2nd"> 2nd </option>
              <option value = "3rd"> 3rd </option>
              <option value = "4th"> 4th </option>
              <option value = "5th"> 5th </option>
              <option value = "6th"> 6th </option>
              <option value = "7th"> 7th </option>
              <option value = "8th"> 8th </option>
              <option value = "9th"> 9th </option>
              <option value = "10th"> 10th </option>
              <option value = "11th"> 11th </option>
              <option value = "12th"> 12th </option>
            </select>
            <span class="error"> <br> <?php echo $grdErr;?></span> <br>
            <input type="text" name="studentschool" placeholder="Insert your school">
            <span class="error"> <br> <?php echo $schErr;?></span> <br>
          </div>
          <div class="hideadmin">
            <input type="text" name="school" placeholder="Insert your school">
            <span class="error"> <br> <?php echo $schErr;?></span> <br>
          </div>
          <script>
            $('.hidecontent').hide();
            $('.hideadmin').hide();
            $('select[name=utype]').change(function(){
              if ($('select[name=utype]').val() == 'Student'){
                $('.hidecontent').show();
              }else{
                $('.hidecontent').hide();
              }
            });

            $('select[name=utype]').change(function(){
              if ($('select[name=utype]').val() == 'School_Manager'){
                $('.hideadmin').show();
              }else{
                $('.hideadmin').hide();
              }
            });
          </script>
          <br> <br>
          <input class="emptytab" type="submit" name="signup" value="SIGNUP">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
