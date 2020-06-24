<?php
    session_start();

    // open new connection to the mysql server
    $mysqli = mysqli_connect('localhost','root','','perfectcup');

    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $message = mysqli_real_escape_string($mysqli, $_POST['message']);

    $email2 = "marblesandsl@gmail.com";
    $subject = "Text message";

    if(strlen($fname)> 50){
        echo 'fname_long';
    }elseif (strlen($fname) < 2){
        echo 'fname_short';
    }elseif (strlen($email) > 50){
        echo 'email_long';
    }elseif (strlen($email) < 2){
        echo 'email_short';
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        echo 'eformat';
    }elseif (strlen($message) > 500){
        echo 'message_long';
    }elseif (strlen($message) < 3){
        echo 'message_short';
    }else{
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'marblesandsl@gmail.com';                     // SMTP username
        $mail->Password   = 'abcd1234!@#';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->AddReplyTo($email);
        $mail->From = $email2;
        $mail->FromName = $fname;
        $mail->addAddress('marblesandsl@gmail.com', 'Admin'); //add recipient

        $mail->isHTML(true);    //set email format to html

        $mail->Subject=$subject;
        $mail->Body=$message;
        $mail->AltBody='This is the body in plain text for non html mail clients.';

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error : ' . $mail->ErrorInfo ;
        }else{
            echo 'true';
        }

    }
?>