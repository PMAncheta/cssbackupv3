<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = $_POST ['email'];
    $password = $_POST ['pass'];
    
    $select = "SELECT * FROM user WHERE email = '$email' && pass = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:user_panel.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_panel.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>