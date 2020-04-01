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
$sql = "DELETE FROM appointments WHERE appointment_ID = $id"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ../check-appointments.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>