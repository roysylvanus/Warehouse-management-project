<?php
session_start();

include 'models/employee_contr.php';

if(isset($_GET['deleteid']))
{
        $id = $_GET['deleteid'];
        
        $employee = new EmployeeObject();
        $result = $employee->deleteEmployee($id);
        
        if($result){
       
        header("location: employees.php");
        }else{
        
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='employees.php';
            </script>");
        }
}


?>