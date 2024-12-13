<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Connect</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="imgs/hackathonLogo.ico">
    <link rel="stylesheet" href="css/form.css">
   <style>
      body{
        background-image: url('imgs/collage.jpg');
    }
    body::after{
        content:none;
    }
    .center{
        justify-content: flex-start;
    }
   </style>
</head>
<body>
    
    <div class="circle" id="circle"> </div>
    <br>
;
<div class="form" >
<form action="register.php" method="post" class="formContainer">
    <h1 class=" tittle">Registration</h1>

    <?php include('errors.php'); ?>
    <input autocomplete="off" type="text" name="full_name" placeholder="Your Name" value="<?php echo $full_name; ?>">
    <input autocomplete="off" type="email_id" name="email_id" placeholder="Your Email_id" value="<?php echo $email_id; ?>">
    <input autocomplete="off" type="password" placeholder="Password" name="password_1">
     <input  autocomplete="off" type="password" placeholder="Confirm Password" name="password_2">
    <button type="submit" class="btn" name="reg_user">Register</button>
    <br><p>Already have an Account??</p><br>
    <button class="btn" ><a href="login.php">Sign in</a></button>


</form>
    </div>

   
 
 <div class="footer">
 
  <div class="child center">
  <a href=""><img class="logo1" src="imgs/logo.png" alt=""></a>
   <a href="https://www.bitmesra.ac.in/bitnoida"><img class="logo" src="imgs/Birla_Institute_of_Technology_Mesra.png" alt=""></a></div>
 


</div>
<script src="js/java.js"></script>
</body>
</html>





