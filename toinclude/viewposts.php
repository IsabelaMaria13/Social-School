<?php
    include 'dbh_inc.php';
    $info = ""; $textErr = ""; $x = 0;
    $username = $_SESSION['us_username'];
    $school = $_SESSION['us_school'];

    $sql = "SELECT * FROM posts WHERE user_school='$school'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
?>
