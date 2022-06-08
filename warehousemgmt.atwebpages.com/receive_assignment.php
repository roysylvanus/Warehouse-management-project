<?php
session_start();

include 'models/assignments_contr.php';

if(isset($_GET['assignmentid']))
{
        $id = $_GET['assignmentid'];
       
       $assignment = new AssignmentObject();
       $result = $assignment->receiveDevice($id);
       
       
        
        if($result){
       
        header("location: assignments.php");
        } else{
        
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='assignments.php';
            </script>");
        }
}


?>