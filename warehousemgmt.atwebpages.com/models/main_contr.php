<?php
session_start();

include('includes/db.php');

class MainObject{

     
     public function getTotalCategories(){
         
          $db= new Dbh();
          $con = $db->connect();
          
          
           $query = "SELECT * FROM `categories`";
             $categ_result =mysqli_query($con, $query);
             if($categ_result>0)
                {
                $row = mysqli_num_rows($categ_result);   
          return $row;
       
         }
         mysqli_close($con);
     
     
     }
     
       public function getTotalEmployees(){
         
          $db= new Dbh();
          $con = $db->connect();
          
          
           $query = "SELECT * FROM `employees`";
             $categ_result =mysqli_query($con, $query);
             if($categ_result>0)
                {
                $row = mysqli_num_rows($categ_result);   
          return $row;
       
         }
         mysqli_close($con);
     
     
     }
     
       public function getTotalAssignments(){
         
          $db= new Dbh();
          $con = $db->connect();
          
          
           $query = "SELECT * FROM `assignments`";
             $categ_result =mysqli_query($con, $query);
             if($categ_result>0)
                {
                $row = mysqli_num_rows($categ_result);   
          return $row;
       
         }
         mysqli_close($con);
     
     
     }
     
     public function getOperatingDevicesAndStock(){
     
      $db= new Dbh();
          $con = $db->connect();
          
          
           $query = "SELECT devices.*,categories.name AS category_name, count(*) AS count FROM `assignments` left join `devices` ON assignments.device_id = devices.id left join `categories` ON devices.category_id = categories.id GROUP BY assignments.device_id";
           $categ_result =mysqli_query($con, $query);
             if($categ_result>0)
                {
                 while($row = mysqli_fetch_assoc($categ_result)){
                 
                   $array[] = $row;
                }
           
             return $array;
     
       }
         
         mysqli_close($con);
     }

}

?>