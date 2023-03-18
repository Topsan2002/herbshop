<?php

    include("../../connect.php");
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require '../../PHPMailer/src/Exception.php';
    // require '../../PHPMailer/src/PHPMailer.php';
    // require '../../PHPMailer/src/SMTP.php';

    if(isset($_POST["email"])) {

        $email = $_POST["email"];

        $query = $conn->query("SELECT * FROM tb_user WHERE email = '$email'");
        // $fet = $conn->query($query);

        if(empty($email)){
            echo "Field is empty";
        }else {
            if($query->num_rows > 0){
                $token = uniqid(md5(time()));

                $insert_query = "INSERT INTO tb_forget(email, token) VALUES ('$email', '$token')";
                $res = $conn->query($insert_query);

                echo "Click <a href='../layout/reset.php?token=$token'>here</a>here to reset your password";
            } else {
                echo "User not found";
            }
        }

        // $mail = new PHPMailer(true);
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'thanawat.220222@gmail.com';
        // $mail->Password = 'ptbadtdkzgqkueoq';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Post = 465;
        // $mail->setFrom('thanawat.220222@gmail.com');
        // $mail->addAddress($_POST["email"]);
        // $mail->isHTML(true);
        // $mail->Subject = 'Verify your email';
        // $mail->Body = 'test';
        // $mail->send();
    }
?>