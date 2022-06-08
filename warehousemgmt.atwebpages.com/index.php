<?php
session_start();

require('models/main_contr.php');
require('models/user_contr.php');

 $main = new MainObject();

 if (empty($_SESSION['name'])){
                     header("location:login.php");

 }
 

   if(!empty($_SESSION['id']))
 {
      $id = $_SESSION['id']; 
      
             $user = new UserObject();
             $user->fetchUserDetails($id);
     
          
 }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

          <div class="container py-5">

<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <h5 class="text-light">Warehouse Management</h5>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
  </div>
</nav>


<div class="row">
    <div class="col-3">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link active" aria-current="page" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="categories.php" class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Categories
        </a>
      </li>
       <li>
        <a href="employees.php" class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#employees"></use></svg>
          Employees
        </a>
      </li>
       <li>
        <a href="devices.php" class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#devices"></use></svg>
          Devices
        </a>
      </li>
       <li>
        <a href="assignments.php" class="nav-link text-white" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#assignments"></use></svg>
          Assignments
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="user.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$_SESSION['fname'];?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">


        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
    </div>
    <div class="col">
    
    <div class="container py-5">
    
    <div class="row mb-3">
  <div class="col-sm-4">
    <div class="card text-white bg-info"  style="max-width: 18rem;">
      <div class="card-header">Categories</div>
      <div class="card-body">
      <?php
     
      $total_categories = $main->getTotalCategories();
      echo '<h4 class="card-text">'.$total_categories.'</h4>';
      ?>
        
      </div>
    </div>
  </div>
 <div class="col-sm-4">
    <div class="card text-white bg-info"  style="max-width: 18rem;">
      <div class="card-header">Employees</div>
      <div class="card-body">
        <?php
     
      $total_employees = $main->getTotalEmployees();
      echo '<h4 class="card-text">'.$total_employees.'</h4>';
      ?>
      </div>
    </div>
  </div>
  
   <div class="col-sm-4">
    <div class="card text-white bg-info"  style="max-width: 18rem;">
      <div class="card-header">Assignments</div>
      <div class="card-body">
        <?php
     
      $total_assignments = $main->getTotalAssignments();
      echo '<h4 class="card-text">'.$total_assignments.'</h4>';
      ?>
      </div>
    </div>
  </div>
</div>
</div>
    
    <div class="card bg-light"  >
  <div class="card-header">Devices</div>
  <div class="card-body">
  <table class="table">
  <thead class="thead-light">
    <tr>

      <th scope="col">Device</th>
       <th scope="col">Category</th>
       <th scope="col">Quantity</th>
      <th scope="col">In operation</th>
    </tr>
  </thead>
  <tbody>
     <?php
     
     $items=$main->getOperatingDevicesAndStock();
    foreach($items as $row)  {
               
                  $device_name = $row['name'];
                   $category_name = $row['category_name'];
                  $quantity = $row['quantity'];
                  $count = $row['count'];
                 
             
                echo '<tr>
              <td scope="row">'.$device_name.'</td>
              <td>'.$category_name.'</td>
              <td>'.$quantity.'</td>
               <td>'.$count.'</td>
               
             
            </tr>';
             }
        
         
  ?>
  </tbody>
</table>
  </div>
</div>
 
  </div>
</div>

  </body>
</html>