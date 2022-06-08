<?php
session_start();

include('includes/db.php');

class CategoryObject{

        private $id;
        private $name;
        private $created_at;
       
        
        public function addCategory($id,$name, $created_at){
         $db= new Dbh();
         $con = $db->connect();
         
         
        $query = "INSERT INTO `categories`(`id`, `name`, `creation_date`) VALUES ('$id','$name','$created_at')";
           if (mysqli_query($con, $query)) {
   

        } else {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed. Please try again');
            </script>");
  
        }
        mysqli_close($con);
        
        }
        
        
        public function deleteCategory($id){
         $db = new Dbh();
        $con = $db->connect();
        
        $query = "DELETE FROM `categories` WHERE `id`= '$id'";
        $result = mysqli_query($con,$query);
        return $result;
        mysqli_close($con);
        
        }
        
        
        public function updateCategory($id,$name,$date){
         $db = new Dbh();
        $con = $db->connect();
       
        $query = "UPDATE `categories` SET `name`='$name',`creation_date`='$date' WHERE `id`='$id'";
        $result = mysqli_query($con,$query);
        return $result;
        mysqli_close($con);
        
        }
        
        public function fetchCategories(){
          
          $db= new Dbh();
          $con = $db->connect();
          $array = array();
          
           $query = "SELECT * FROM `categories`";
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