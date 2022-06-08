<?php
session_start();

include 'models/category_contr.php';

if(isset($_GET['deleteid']))
{
        $id = $_GET['deleteid'];
        
       $category = new CategoryObject();
       $result = $category->deleteCategory($id);
        
        if($result){
      
        header("location: categories.php");
        }else{
        
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='categories.php';
            </script>");
        }
}


?>