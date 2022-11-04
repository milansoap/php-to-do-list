<?php 
session_start();
include "db_conn.php";
// include "registerscript.php";
// echo $hash;




if (isset($_POST['email']) && isset($_POST['password'])) {
     
    function validate($data) {
        $data = htmlspecialchars($data);
        return $data;
    }



    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: index.php?error=Email is required");
        exit();

    }else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    }

    else {


       
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $hashed = $row['password'];

            if($row['email'] === $email && password_verify($password,$row['password'])) {
                echo 'Logged in';
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }
            else {
                echo $password;
                echo $hashed;

                if (password_verify($password,$hashed)) {
                    echo "tacno";
                }
                else {
                    echo "netacno";
                }
            exit();
            }

        }
        else {
            header("Location: index.php?error=Incorect username or password2");
        exit();
        }

    }


}

else {
    header("Location: login.php?error");
    exit();
}





  ?>