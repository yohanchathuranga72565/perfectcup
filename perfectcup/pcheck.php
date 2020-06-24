<?php
    session_start();

    // open new connection to the mysql server
    $mysqli = mysqli_connect('localhost','root','','perfectcup');

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query1 = "SELECT * FROM members WHERE email='{$email}'";
    $result_set1 = mysqli_query($mysqli, $query1);
    $row = mysqli_fetch_array($result_set1);

    if(mysqli_num_rows($result_set1) >= 1){
        if(password_verify($password, $row['password'])){
            $_SESSION['login']= $row['id'];
            $_SESSION['fname']= $row['fname'];
            $_SESSION['lname']= $row['lname'];

            echo 'true';
        }else{
            echo 'false';
        }
    }else{
        echo 'false';
    }
?>