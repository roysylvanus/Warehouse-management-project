<?php
session_start();
require_once('includes/db.php');
  
          
     
class UserObject  {
        
        private $id;
        private $first_name;
        private $last_name;
        private $phone;
        private $email;
        private $mobile;
        private $password;
        private $conf_password;
        
      
        
        public function createUser($id,$first_name,$last_name, $email, $phone, $password, $conf_password){
                
              $db= new Dbh();
              $con = $db->connect();
     
             $query = "INSERT INTO `users`( `id`,`first_name`, `last_name`, `email`, `password`, `phone`, `creation_date`) VALUES ('$id','$fname','$lname','$email','$password','$phone','$date')";
      
                   if (mysqli_query($con, $query)) {
                   
                echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Registered');
            window.location.href='login.php';
            </script>");
            
                } else {
                
                  echo ("window.alert('Failed. Please try again');");
                  
                }
                
                mysqli_close($con);
        
       }      
        
        
        public function loginUser($email,$password){
             
               $db= new Dbh();
              $con = $db->connect();
            
                $query = "SELECT * FROM `users` WHERE `email`= '$email'";
                $result = mysqli_query($con,$query);
                
                
                if(mysqli_num_rows($result)>0)
                {
                        $row = mysqli_fetch_object($result);
                        
                        if(password_verify($password,$row->password))
                        {
                         $_SESSION['id'] = $row->id;
                         $_SESSION['name'] = $row->email;
                        
                            
                        } else{
                         
                         $_SESSION['login_attempts'] +=1;
                        
                         $_SESSION['error'] = "Incorrect password. Please try again";
                        }
                        
                        
                } else{
                          $_SESSION['login_attempts'] +=1;
                     $_SESSION['error'] = "User was not found";   
                }
                
                 if(isset($_SESSION['name'])) {
                  header("location:index.php");
                 }
      
        }
        
        
        public function checkUserInDb(){
        
        }
        
        public function logOut(){

        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header("location:login.php");
        
        }
        
        public function fetchUserDetails($id){
            $db= new Dbh();
              $con = $db->connect();
         
    
                
                $query = "SELECT * FROM `users` WHERE `id`= '$id'";
                $result = mysqli_query($con,$query);
                
                
                if(mysqli_num_rows($result)>0)
                {
                        $row = mysqli_fetch_object($result);
                        
                       $_SESSION['fname']= $row->first_name;
                       
                        return $row;
                        
                } 
                
         
        }
        
        
       
  }




?>