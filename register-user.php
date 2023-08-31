<?php
include_once("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $middlename =  $_POST['middlename'];
    $lastname =  $_POST['lastname'];
    $birthday =  $_POST['birthday'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];

    $hashedPassword = md5($password);

    $insert = "INSERT INTO `user_account`(`firstname`, `middlename`, `lastname`, `birthday`, `username`, `password`)
                VALUES ('$firstname','$middlename','$lastname','$birthday','$username','$hashedPassword')";
    if ($con->query($insert) === TRUE) {

        header("Location:index.php");
    }
}
