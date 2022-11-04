<?php 
include "db_conn.php";



if (isset($_GET['id'])) {

    // $id = $_GET['id'];
    // $delete = mysqli_query($conn,"DELETE FROM 'todo' WHERE 'id' ='$id' ");
    // header("Location: home.php");
    // die();

    $result = mysqli_query($conn,"SELECT * FROM todo");

    $sql = "DELETE FROM todo WHERE id='" . $_GET['id'] . "'";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    

}



?>