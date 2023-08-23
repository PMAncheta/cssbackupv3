

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   <style>
      .body {
         background-image: url('image/bgerror3.jpg');
         background-position: center bottom 0px;
         background-repeat: no-repeat;
         background-size: 100%;
         background-attachment: fixed;
      }
      #showHideIcon {
         cursor: pointer;
      }
   </style>

</head>
<body class="body">
   <div class="form-container">

      <div class="logo-align">
         <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Philippine_Military_Academy_%28PMA%29.svg/1200px-Philippine_Military_Academy_%28PMA%29.svg.png">
      </div>

         <form action="insert.php" method="post">
            <h3>Register Now</h3>
            <?php
            if(!empty($error)){
               foreach($error as $errorMsg){
                  echo '<span class="error-msg">'.$errorMsg.'</span>';
               };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="pass" required placeholder="enter your password" id="password">
            <!-- <span id="showHideIcon" class="fas fa-eye-slash" onclick="togglePasswordVisibility()"></span> -->
            <input type="password" name="cpass" required placeholder="confirm your password">
            <select name="user_type">
               <option value="user">user</option>
            </select>
            <input type="submit" name="submit" value="submit" class="form-btn">
            <p>already have an account? <a href="login_form.php">login now</a></p>
         </form>

   </div>

   <script src="script.js"></script>

</body>
</html>