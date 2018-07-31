<?php
    $allowed = array('jpg', 'jpeg', 'png');
    if(isset($_POST['submit'])){
       $file = $_FILES['file'];

       $name = $file['name'];
       $temp = $file['tmp_name'];
       $size = $file['size'];
       $err = $file['error'];
        
       $ext = explode('.', $name);
       $low_ext = strtolower(end($ext));

       if(in_array($low_ext, $allowed, true)){
            if($err === 0){
                if($size < 5000000){
                    $newFileName = "poza.jpg";
                    $dest = '../resources/'.$newFileName;
                    move_uploaded_file($temp, $dest);
                    $upload = true;
                    $fisier = $dest;
                    header('Location: schoolmanager.php?state=success');
                }else{
                    echo 'Your file is too big';
                    header('Location: schoolmanager.php?state=toobig');
                }
            }else{
                echo $err;
                header('Location: schoolmanager.php?state=err');
            }
       }else{
            header('Location: schoolmanager.php?state=typeprob');
       }
   }
?>