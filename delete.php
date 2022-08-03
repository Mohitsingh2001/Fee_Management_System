<?php 
//php script for deleting student records.

include_once('connection.php');

$srno = $_GET['sr_no'];

$sql = "DELETE FROM `student_recipt` WHERE sr_no = $srno";

mysqli_query($conn,$sql);

header('location: register.php');
 



?>