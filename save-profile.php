<?php
include_once("connect.php");
if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST['user_id'];
        $firstname = $_POST['firstname'];
        $middlename =  $_POST['middlename'];
        $lastname =  $_POST['lastname'];
        $birthday =  $_POST['birthday'];

        $update = "UPDATE `user_account` SET `firstname`='$firstname', `middlename`='$middlename', `lastname`='$lastname', `birthday`='$birthday' 
                WHERE `user_id` = '$user_id'";
        $result = $con->query($update);
        if ($result == TRUE) {
            session_start();
            $_SESSION['success'] = "Profile Updated Successfully";
            header("Location:home.php");
        }
    }
}
