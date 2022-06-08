<?php
session_start();

include 'models/devices_contr.php';

if(isset($_POST['update']))
{
        $db = new Dbh();
        $con = $db->connect();
        $id = $_POST['update_id'];
        $name =$_POST['update_name'];
        $category_id = $_POST['update_category'];
        $quantity = $_POST['update_quantity'];
          $date= date("Y/m/d");
          
          $device = new DeviceObject();
          $result = $device->updateDevice($id,$name,$category_id,$quantity, $date);
       
         
        if($result){

       
        header("location: devices.php");
      
      
        } else{
           echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='devices.php';
            </script>");
        }
       
}


?>