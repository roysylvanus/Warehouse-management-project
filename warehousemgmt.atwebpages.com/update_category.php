<?php
session_start();

include 'models/category_contr.php';

if(isset($_POST['update']))
{
        $db = new Dbh();
        $con = $db->connect();
        $id = $_POST['update_id'];
        $name =$_POST['update_name'];
          $date= date("Y/m/d");
       
      $category = new CategoryObject();
        $result =  $category->updateCategory($id,$name,$date);
        
        if($result){

        header("location: categories.php");
       } else{
           echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='categories.php';
            </script>");
        }
}



?>