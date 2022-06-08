<?php
session_start();

include 'models/devices_contr.php';

if(isset($_GET['deleteid']))
{
        $id = $_GET['deleteid'];
        
        $device = new DeviceObject();
        $result = $device->deleteDevice($id); 
        
        if($result){
       
        header("location: devices.php");
        }else{
        
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed try again');
            window.location.href='devices.php';
            </script>");
        }
}


?>