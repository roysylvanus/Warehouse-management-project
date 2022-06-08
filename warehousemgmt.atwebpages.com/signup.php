<?php
require('models/user_contr.php');
  if(isset($_POST['register'])){

      
         
     $email = $_POST['email'];
     $password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
     $fname = $_POST['first_name'];
     $lname = $_POST['last_name'];
     $conf_password = $_POST['confirm_password'];
     $phone = $_POST['phone'];
     $id = 0;
     $date= date("Y/m/d");
     
     $user = new UserObject();
    $user->createUser($id,$first_name,$last_name, $email, $phone, $password, $conf_password);
     
     }
   
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register page</title>
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
  <h4 class="alert-heading">Register Here!</h4>
  <p>Please enter your credentials to register</p>
  
</div>
    
 <form class="row g-3" method="post">
 <div class="col-md-6">
    <label for="inputFirstName4" class="form-label">First name</label>
    <input type="text" class="form-control" id="inputFirstName4" name="first_name">
  </div>
  <div class="col-md-6">
    <label for="inputLastname4" class="form-label">Last name</label>
    <input type="text" class="form-control" id="inputLastname4" name="last_name">
  </div>
 <div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
  <label for="floatingPassword">Password</label>
</div>
  <div class="form-floating">
  <input type="password" class="form-control" id="inputConfirmPassword4" placeholder="Password" name = "confirm_password" required>
    <label for="inputConfirmPassword4">Confirm Password</label>
    
  </div>
  <div class="form-floating">
   <input type="tel" class="form-control" id="inputPhone4" placeholder="+48" name="phone">
    <label for="inputPhone4">Phone</label>
   
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="register">Register</button>
  </div>
</form>
  <a class="dropdown-item" href="login.php">Already a member? Login</a>
  </div>
  </div>
  

</div>


  </body>
</html>