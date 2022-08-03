
<?php   //making connection with database.
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="studentdb";

$conn =mysqli_connect($servername,$username,$password,$dbname);
if (!$conn)
 {
    die("sorry connection not established:". mysqli_connect_error());
}

?>
  
