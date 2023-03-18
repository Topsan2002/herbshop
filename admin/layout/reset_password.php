<?php
    include("../../connect.php");

    if(isset($_POST['email']) || ($_POST['password']) ($_POST['confirmpassword'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if(empty($password) || empty($confirmpassword)) {
            echo "Empty Fields";
        }else{
            if($password == $confirmpassword) {
                $hashed = md5($password);

                $query = $conn->query("UPDATE user SET password = '$hashed' WHERE email = '$email'");
                echo "Password is updated successfully! Click <a href='index.php'>here</a> to login again.";
            }else {
                echo "Passwords do not match";
            }
        }
    }
?>