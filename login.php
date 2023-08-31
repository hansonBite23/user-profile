<?php
include_once("connect.php");
session_start();
$username =  $_POST['username'];
$password =  $_POST['password'];
$hashedPassword = md5($password);

if (empty($username)) {
    session_start();
    $_SESSION['emptyFieldUsername'] = "Username must require";
    header("Location:index.php");
}
if (empty($password)) {
    session_start();
    $_SESSION['emptyFieldPassword'] = "Password must require";
    header("Location:index.php");
} else {
    $sql = "SELECT * FROM `user_account` WHERE username = '$username' AND password = '$hashedPassword'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) === 1) {
        session_start();
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['user_id'];
        header("Location:home.php");
    } else {
        header("Location: index.php?error");
    }
}
?>
