<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once('connection.php');
global $con;
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
// Check connection

// sql to delete a record
$sql = "DELETE FROM users WHERE user_id = $id"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ../lawyers.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>