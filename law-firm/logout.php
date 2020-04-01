<?php
include_once('includes/connection.php');
session_start();
global $con;
unset($_SESSION["user_email"]);
//session_destroy
header("Location:officials.php");
exit();
?>