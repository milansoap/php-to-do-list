<?php 
include "db_conn.php";

session_start();

if (isset($_POST['createData'])) {

    $userid = $_SESSION['id'];
    $title = $_POST['createInputTitle'];
    $text = $_POST['createInputText'];


    $sql = "INSERT INTO todo(user_id,title,text) VALUES (?,?,?) ";

    $stmt = $conn->prepare($sql);

        $stmt->bind_param('iss', $userid, $title, $text);
        $stmt->execute();

        header("Location: home.php");
        exit;

    

}



?>