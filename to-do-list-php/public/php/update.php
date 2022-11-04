<?php 
include "db_conn.php";



if (isset($_POST['updatedata'])) {

    $id = $_POST['inputIdphp'];
    $title = $_POST['inputTitlephp'];
    $text = $_POST['inputTextphp'];


    $sql = "UPDATE todo SET title='$title', text='$text' WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
        echo '<script> alert("data updated") </script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        echo '<script> alert("data updated") </script>';
    }

    mysqli_close($conn);

    

}



?>