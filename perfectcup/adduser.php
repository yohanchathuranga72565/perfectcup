<?php
    session_start();

    // open new connection to the mysql server
    $mysqli = mysqli_connect('localhost','root','','perfectcup');

    // Checking the connection
    $fname="";
    $lname="";
    $email="";
    $password="";

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // echo $fname;
    // print_r($_POST);
    
    // validation
    if (strlen($fname) < 2){
        echo "fname";
    } elseif(strlen($lname) < 2){
        echo "lname";
    } elseif(strlen($email) <= 4){
        echo "eshort";
    } elseif(filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
        echo "eformat";
    } elseif(strlen($password) < 4){
        echo "pshort";
    } else{
        $spassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        $query = "SELECT email FROM members WHERE email = '{$email}'";
        $result = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($result) < 1){
            $insert_row = "INSERT INTO members (fname, lname, email, password) VALUES ('{$fname}','{$lname}','{$email}','{$spassword}')";
            $result_insert = mysqli_query($mysqli, $insert_row);

            if($result_insert){
                $query1 = "SELECT * FROM members WHERE email='{$email}'";
                $result1= mysqli_query($mysqli, $query1);
                foreach($result1 as $row){
                    $_SESSION['login']= $row['id'];
                }
                    $_SESSION['fname']= $row['fname'];
                    $_SESSION['lname']= $row['lname'];

                    echo "true";

            }
            
        }
        else{
            echo "false";
        }
    }




?>