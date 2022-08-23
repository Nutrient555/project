<?php 
     session_start();
     include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="hearder">
        <h2>Register</h2>
    </div>

    <form action="subscribe.php" method="post"> 
          <?php include('errors.php');?>
          <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?> 
          <div class="input-group">
               <label for="id_nisit">Student ID</label>
               <input type="int" name="id_nisit">
          </div>
          <div class="input-group">
               <label for="username">Username</label>
               <input type="text" name="username">
          </div>
           <div class="input-group">
               <label for="password_1">Password</label>
               <input type="password" name="password_1">
          </div>
          <div class="input-group">
               <label for="password_2">Confirm Password</label>
               <input type="password" name="password_2">
          </div>
          <div class="input-group">
               <label for="first_name">Firstname</label>
               <input type="text" name="first_name">
          </div>
          <div class="input-group">
               <label for="last_name">Lastname</label>
               <input type="text" name="last_name">
          </div>
          <div class="input-group">
               <button type="submit" name="reg_user" class="btn">Register</button>
          </div>
          <p>Already a member?<a href="login.php">Sign in</a></p>
    </form>
    
</body>
</html>