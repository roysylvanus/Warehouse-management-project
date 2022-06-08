<?php
session_start();

include('includes/db.php');


class DeviceObject {

        private $id;
        private $name;
        private $created_at;
        private $category_id;
        private $quantity;
      
       
        
        public function addDevice($id,$name,$category_id,$quantity, $created_at){
         $db= new Dbh();
         $con = $db->connect();
       
         

       $dev_query = "INSERT INTO `devices`(`id`, `name`, `category_id`, `quantity`,`created_at`) VALUES ('$id','$name','$category_id','$quantity','$date')";   
          if (mysqli_query($con, $dev_query)) {
   

        } else {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed. Please try again');
            </script>");
  
        }
        mysqli_close($con);
        
        }
        
        
        public function deleteDevice($id){
          $db = new Dbh();
        $con = $db->connect();
        
        $query = "DELETE FROM `devices` WHERE `id`= '$id'";
        $result = mysqli_query($con,$query);
        return $result;
        mysqli_close($con);
        
        }
        
        
        public function updateDevice($id,$name,$category_id,$quantity, $date){
                 $db= new Dbh();
          $con = $db->connect();
         $query = "UPDATE `devices` SET `name`='$name',`category_id`='$category_id',`quantity`='$quantity',`created_at`='$date' WHERE `id`='$id'";
        $result = mysqli_query($con,$query);
        return $result;
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
         
           public function fetchCategories(){
          
          $db= new Dbh();
          $con = $db->connect();
          $array = array();
          
           $query = "SELECT * FROM `categories`";
             $cat_result =mysqli_query($con, $query);
             if($cat_result>0)
                {
                 while($newrow = mysqli_fetch_assoc($cat_result)){
                 
                   $newarray[] = $newrow;
                }
           
             return $newarray;
     
             
         
         }
         mysqli_close($con);
          
         
         }


}


?>