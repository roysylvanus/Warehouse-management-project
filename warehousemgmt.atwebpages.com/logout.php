<?php
session_start();

require('models/user_contr.php');

$user = new UserObject();
$user->logOut();
?>