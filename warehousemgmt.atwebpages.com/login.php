<?php

 require 'models/user_contr.php';
  session_start();


        
         if (!empty($_SESSION['name'])){
                     header("location:index.php");

         }

        
      
        
         if(isset($_SESSION['locked'])){
        
        $time_difference = time() - $_SESSION['locked'];
        if($time_difference>30){
        
        unset($_SESSION['locked']);
        unset($_SESSION['login_attempts']);
        }
        
        }

       if(isset($_POST['login'])){
     
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = new UserObject();
        
        $user->loginUser($email,$password);
             
       
       }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <!-- Follow these instructions, please! -->
  <div class="container py-5">
  <div class= "row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
  
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Login Here!</h4>
  <p>Please enter your credentials to login</p>
  
</div>
    
 <form class="px-4 py-3" method="post">
 
    <?php if(isset($_SESSION['error'])){ ?>
            <p style= "color: red;"><?=$_SESSION['error'];?></p>
   <?php unset($_SESSION['error']); } ?>    
  
    
    <div class="mb-3">
      <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
    </div>
   
    
    <?php
            if($_SESSION['login_attempts']>2){
            
            $_SESSION['locked'] = time();
            
            echo "<p>Please wait for 30 seconds</p>";
            
            } else{
               
    ?>
    
    <button type="submit" class="btn btn-primary" name="login">Sign in</button>
   <?php } ?>
    
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="signup.php" >New around here? Sign up</a>
  
  </div>
  </div>
</div>

  </body>
</html>