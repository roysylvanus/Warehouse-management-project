<?php
session_start();
 
  require('models/assignments_contr.php');
  require('models/user_contr.php');
  $assignment = new AssignmentObject();
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
    <title>Assignments page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>



 </head>
  <body>



   <! -- Add Assignments Modal -->
   <div class="modal fade" id="addAssignmentModal" tabindex="-1" aria-labelledby="addAssignmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAssignmentModalLabel">Assign Device</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form method="post" action="assignments.php"> 
      <div class="modal-body">
       <h6>Please fill in assignment details</h6>
      
             
                <div class="row">
                  
                  <div class="col">
                  
                  <p>Employees</p>
                  </div>
                  <div class="col">
                  
                    <select name="employee" multiple>
              <option value="" disabled selected>Choose option</option>
               <?php
                    $employees = $assignment->fetchEmployees();
                    
                    foreach($employees as $row){
                    echo '
  <option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</option> ';
                    
                    }
               ?>
              </select>
                  </div>  
                  </div>   
                  
                  <div class="row">
                  
                  <div class="col">
                  
                  <p>Devices</p>
                  </div>
                  <div class="col">
                  
                    <select name="device" multiple>
              <option value="" disabled selected>Choose option</option>
               <?php
                    $devices = $assignment->fetchDevices();
                    
                    foreach($devices as $row){
                    echo '
  <option value="'.$row['id'].'">'.$row['name'].'</option> ';
                    
                    }
               ?>
              </select>
                  </div>  
                  </div>          
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
        
         <?php
  
   if(isset($_POST['add'])){
 
    
            
    
     $id = 0;
     $device_id = $_POST['device'];
     $employee_id = $_POST['employee'];
     $status = "assigned";
     $date= date("Y/m/d");
     
    
     $assignment->addAssignment($id,$employee_id,$device_id,$status, $date);

        }
  ?>
        
      </div> 
       </form>
    </div>
    
    
  </div>
</div>
   
 
    
     <! -- Main Content -->
   
   
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
        <a href="index.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="categories.php"  class="nav-link text-white"  >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#categories"></use></svg>
          Categories
        </a>
      </li>
      <li>
        <a href="employees.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#categories"></use></svg>
          Employees
        </a>
      </li>
       <li>
        <a href="devices.php"  class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#categories"></use></svg>
          Devices
        </a>
      </li>
       <li>
        <a href="assignments.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#categories"></use></svg>
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
           <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssignmentModal">Assign device</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <table class="table"id="device_table">
  <thead>
    <tr>
      <th scope="col">Employee name</th>
      <th scope="col">Device id</th>
       <th scope="col">Device Status</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
       
    </tr>
  </thead>
  <tbody>
  

  
  <?php
     
     $assignments=$assignment->fetchAssignments();
    foreach($assignments as $row)  {
              $cat_id =$row['id'];
              $first_name=$row['first_name'];
              $last_name =$row['last_name'];
              $employee_name =$first_name.' '.$last_name;
               $device_name =$row['device_name'];
                 
                  $device_id =$row['device_id'];
                  $cat_status =$row['status']; 
                  $date = $row['created_at'];
                  
                echo '<tr>
              <td scope="row" style="display: none">'.$cat_id.'</td>
              <td>'.$employee_name.'</td>
              <td>'.$device_name.'</td>
              <td>'.$cat_status.'</td>
               <td>'.$date.'</td>';
               ?>
               <?php
               if ($row['status'] == "assigned"){
            echo   '
               <td>
             <button type="button"   class="btn btn-primary"><a href="receive_assignment.php?assignmentid='.$cat_id.'" class="text-light">Receive</a></button>
             </td>
            </tr>';
             }
             }
  
         
  ?>
 
   

  </tbody>
</table>
  </div>
</div>
    </div>
      
    </div>
  
  </div>
</div>


<script>
$(document).ready( function () {
    $('#device_table').DataTable();
} );
</script>
  </body>
</html>