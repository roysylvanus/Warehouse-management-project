<?php
session_start();

include 'models/employee_contr.php';

if(isset($_POST['update']))
{
        $db = new Dbh();
        $con = $db->connect();
        $id = $_POST['update_id'];
        $first_name =$_POST['update_fname'];
         $last_name =$_POST['update_lname'];
          $email =$_POST['update_email'];
           $phone =$_POST['update_phone'];
          $date= date("Y/m/d");
          
          $employee = new EmployeeObject();
          $result = $employee->updateEmployee($id,$first_name,$last_name,$email,$phone,$date);
          
          
       
        if($result){
        
        header("location: employees.php");
        } else{
           echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='employees.php';
            </script>");
        }
}


?>