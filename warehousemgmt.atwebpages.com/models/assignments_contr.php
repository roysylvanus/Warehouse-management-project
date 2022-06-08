<?php
session_start();

include('includes/db.php');


class AssignmentObject{

        private $id;
        private $employee_id;
        private $device_id;
        private $status;
        private $created_at;
       
        
        public function addAssignment($id,$employee_id,$device_id,$status, $created_at){
         $db= new Dbh();
         $con = $db->connect();
         
         
        $query = "INSERT INTO `assignments`(`id`, `employee_id`,`device_id`,`status`, `created_at`) VALUES ('$id','$employee_id','$device_id','$status','$created_at')";
        
        if (mysqli_query($con, $query)) {
              
         

        } else {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed. Please try again');
            </script>");
  
        }
        mysqli_close($con);
        
        }
        
        
        public function deleteAssignment($id){
        
        
        }
        
        
        public function updateAssignment($id,$employee_id,$device_id,$category_id,$status, $created_at){
        
        
        }
        
        public function fetchAssignments(){
          
          $db= new Dbh();
          $con = $db->connect();
          $array = array();
          
           $query = "SELECT assignments.*,employees.first_name,employees.last_name,devices.name AS device_name FROM `assignments` LEFT JOIN `employees` ON assignments.employee_id = employees.id LEFT JOIN `devices` ON assignments.device_id = devices.id";
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

         

        public function fetchDevices(){
          
          $db= new Dbh();
          $con = $db->connect();
          $array = array();
          
           $query = "SELECT * FROM `devices`";
             $device_result =mysqli_query($con, $query);
             if($device_result>0)
                {
                 while($row = mysqli_fetch_assoc($device_result)){
                 
                   $array[] = $row;
                }
           
             return $array;
     
             
         
         }
         mysqli_close($con);
          
         
         }
         
         public function receiveDevice($id){
           $db= new Dbh();
          $con = $db->connect();
           $status = "received";
         $date= date("Y/m/d");
        
        $db = new Dbh();
        $con = $db->connect();
        
        $query = "UPDATE `assignments` SET `status`='$status',`created_at`='$date' WHERE `id`= '$id'";
        $result = mysqli_query($con,$query);
        return $result;
        
        mysqli_close($con);
       
         }
         
       
     
        
         
         
}


?>