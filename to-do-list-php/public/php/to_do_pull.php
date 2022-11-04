<?php 

include "db_conn.php";

$user = $_SESSION['user'];
$loggeduserid = $user['id'];

echo $loggeduserid;


$sql = " SELECT * FROM todo  ";
$result = $mysqli->query($sql);
$mysqli->close();



?>