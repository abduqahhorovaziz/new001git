<?php

$username = filter_input(INPUT_POST, 'user_name');
$email = filter_input(INPUT_POST, 'user_email');
$password = filter_input(INPUT_POST, 'user_password');
$bio = filter_input(INPUT_POST, 'user_bio');

if (!empty($username)) {
    if (!empty($email)) {
        if (!empty($password)) {
            if (!empty($bio)) {
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "root";
                $dbname = "users";

                // create connection

                $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
                } else {
                    $sql = "INSERT INTO form (username, email, password, bio) values ('$username', '$email', '$password', '$bio')";
                    if($conn->query($sql)){
                        echo "New record is inserted successfully";
                    }
                    else{
                        echo "Error: ". $sql . "<br>".
                        $conn->error;
                    }
                    $conn->close();
                }
            }
            else{
                echo "Password should not be empty";
                die();
            }
        }
        else{
            echo "Username should not be empty";
            die();
        }
    }
}
