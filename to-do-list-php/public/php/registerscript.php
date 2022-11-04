<?php 
include "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\wamp64\www\to-do-list\PHPMailer-master\src/Exception.php';
require 'C:\wamp64\www\to-do-list\PHPMailer-master\src/PHPMailer.php';
require 'C:\wamp64\www\to-do-list\PHPMailer-master\src/SMTP.php';

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
     
    function validate($data) {
        $data = htmlspecialchars($data);
        return $data;
    }


    $name = validate($_POST['name']);
    $surname = validate($_POST['surname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($name)) {
        header("Location: register.php?error=Name is required");
        exit();

    }else if (empty($surname)) {
        header("Location: register.php?error=Surname is required");
        exit();
    }
    else if (empty($email)) {
        header("Location: register.php?error=Email is required");
        exit();
    }
    else if (empty($password)) {
        header("Location: register.php?error=Password is required");
        exit();
    }

    else {
       
        $sql = "INSERT INTO user(name, surname, email, password)
        VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ssss', $name, $surname, $email, $hash);
        $stmt->execute();

        header("Location: register.php?success=Your account has been created successfully");


        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPDebug  = 1; 
        $mail->SMTPAuth = true;
        
        $mail->Username="todo6343@gmail.com";
        $mail->Password="mgsjmfuhwznsswcf";

        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        

        $mail->setFrom("todo6343@gmail.com");

        $mail->addAddress($_POST['email']);

        $mail->isHTML(true);
        $mail->Subject = "Confirmed Registration";
        $mail->Body = 'We are glad to inform you that you have succesefully created an account on our To-Do App.';
        $mail->send(); 

        if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}

        exit;








    }


}

else {
    header("Location: register.php?error");
    exit();
}





  ?>


