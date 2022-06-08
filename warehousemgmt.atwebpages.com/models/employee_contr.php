<?php
session_start();

include('includes/db.php');

class EmployeeObject{

        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $phone;
        private $created_at;
        
        
        public function addEmployee($id,$first_name,$last_name,$email,$phone, $created_at){
           $db= new Dbh();
              $con = $db->connect();
        
        $query = "INSERT INTO `employees`(`id`, `first_name`,`last_name`,`email`,`phone`, `created_at`) VALUES ('$id','$first_name','$last_name','$email','$phone', '$created_at')";
           if (mysqli_query($con, $query)) {
   

        } else {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed. Please try again');
            </script>");
  
        }
        mysqli_close($con);
        
        }
        
        
        public function deleteEmployee($id){
        
         $db = new Dbh();
        $con = $db->connect();
        
        $nquery = "DELETE FROM `employees` WHERE `id`='$id'";
        $nresult = mysqli_query($con,$nquery);
         return $nresult;
         
         mysqli_close($con);
        }
        
        
        public function updateEmployee($id,$first_name,$last_name,$email,$phone, $date){
        
         $db= new Dbh();
          $con = $db->connect();
        
        $query = "UPDATE `employees` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`created_at`='$date' WHERE `id`='$id'";
        $result = mysqli_query($con,$query);
        return $result;
        
         
        }
        
         public function fetchEmployees(){
          
          $db= new Dbh();
          $con = $db->connect();
          $array = array();
          
           $query = "SELECT * FROM `employees`";
             $result =mysqli_query($con, $query);
             if($result>0)
                {
                 while($row = mysqli_fetch_assoc($result)){
                 
                   $array[] = $row;
                }
           
             return $array;
     
             
         
         }
         mysqli_close($con);
          
         
         }
         
         


}


?>