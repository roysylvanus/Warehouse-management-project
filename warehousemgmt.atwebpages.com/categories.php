<?php
session_start();
 
  require('models/category_contr.php');
  require('models/user_contr.php');
  $category = new CategoryObject();
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
    <title>Categories page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>



 </head>
  <body>



   <! -- Add Category Modal -->
   <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form method="post" action="categories.php"> 
      <div class="modal-body">
       <h6>Please fill in category details</h6>
       
             
                  <div class="mb-3">
                   <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="categoryName" aria-describedby="emailHelp" name="category_name" placeholder="Enter category name">
                  </div>           
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
        
         <?php
  
   if(isset($_POST['add'])){
 
    
            
     $name = $_POST['category_name'];
     $id = 0;
     $date= date("Y/m/d");
     
    
     $category->addCategory($id,$name,$date);

        }
  ?>
        
      </div> 
       </form>
    </div>
    
    
  </div>
</div>
   
    <! -- Update Category Modal -->
    
     <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form method="post" action="update_category.php"> 
      <div class="modal-body">
       <h6>Please fill in category details</h6>
                     <input type="hidden" name="update_id" id="update_id">
             
                  <div class="mb-3">
                   <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="update_name" name="update_name">
                  </div> 
                  
                    <input type="hidden"  id="update_date">
                    
                     <input type="hidden" id="update_edit">
                      <input type="hidden"  id="update_del">
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                
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
        <a href="categories.php" class="nav-link active" aria-current="page" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#categories"></use></svg>
          Categories
        </a>
      </li>
      <li>
        <a href="employees.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#employees"></use></svg>
          Employees
        </a>
      </li>
       <li>
        <a href="devices.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#devices"></use></svg>
          Devices
        </a>
      </li>
       <li>
        <a href="assignments.php" class="nav-link text-white">
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
           <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add category</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <table class="table"id="category_table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">creation date</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  

  
  <?php
     
     $categories=$category->fetchCategories();
    foreach($categories as $row)  {
              $cat_id =$row['id'];
                 $cat_name =$row['name'];
                  $cat_date =$row['creation_date'];
                  
                echo '<tr>
              <td scope="row" style="display: none">'.$cat_id.'</td>
              <td>'.$cat_name.'</td>
              <td>'.$cat_date.'</td>
             <td>
             <button type="button"  class="btn btn-success editbtn">Edit</button>
             </td>
              <td>
             <button type="button"   class="btn btn-danger"><a href="delete_category.php?
             deleteid='.$cat_id.'" class="text-light">Delete</a></button>
             </td>
            </tr>';
             }
     
      
     
     
    
    
         
  ?>
 
   

   <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#update_name').val(data[1]);
                $('#update_date').val(data[2]);
                $('#update_edit').val(data[3]);
                $('#update_del').val(data[4]);
               
            });
        });
    </script>

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
    $('#category_table').DataTable();
} );
</script>
  </body>
</html>