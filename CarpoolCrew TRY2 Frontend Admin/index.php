<?php

  @include './config.php';

  session_start();
  if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $select = " SELECT * FROM adminlogin WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_assoc($result);

          $_SESSION['aid'] = $row['aid'];
          header('location:./dash.php');
      
    }else{
      $error = 'incorrect email or password!';
      $_SESSION['error']=$error;
    }
  };
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Driver Extra</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
            <h2 class="title">Sign up</h2>
            <p>
            <?php 
              if(isset($_SESSION['error'])){
                $error=$_SESSION['error'];
                echo '<span class="error-msg">'.$error.'</span>';
              }
              unset($_SESSION['error']);
            ?></p>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-key"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" class="btn" name="submit" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>Akele beCar</h1>
            <p>
              We hope you get a lot of rides
            </p>
          </div>
          <img src="img/undraw_by_my_car_27c7.svg" class="image" alt="" />
        </div>
  </body>
</html>
