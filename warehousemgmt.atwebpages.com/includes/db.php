<?php

class Dbh{

    public function connect(){
       $con = mysqli_connect("fdb33.awardspace.net", "4091049_admin", "sylvanuskiprono1", "4091049_admin");
       
       return $con;
    
    }


}



?>
