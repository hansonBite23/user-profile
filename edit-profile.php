<?php
include_once("connect.php");
session_start();
// echo "Hello ID No.: " . $_SESSION['user_id'];
if (!isset($_GET['user_id'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $_GET['firstname']; ?></title>
    <!-- Bootstap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include_once("connect.php");
    $user_id = $_GET['user_id'];
    $sql = "SELECT `user_id`, `firstname`, `middlename`, `lastname`, `birthday`
    FROM `user_account` 
    WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
    ?>
            <div class="container p-3">
                <h2 class="text-center">Edit Profile</h2>
                <form action="save-profile.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" class="form-control">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="inputUsername" class="form-label">First Name</label>
                            <input type="name" name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                        </div>

                        <div class="col-sm-4 mb-3">
                            <label for="inputUsername" class="form-label">Middle Name</label>
                            <input type="name" name="middlename" value="<?php echo $row['middlename']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Middle Name">
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="inputUsername" class="form-label">Lastname</label>
                            <input type="name" name="lastname" value="<?php echo $row['lastname']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="col mb-3">
                        <label for="inputUsername" class="form-label">Birthday</label>
                        <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" class="form-control" id="">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary align-items-end  ">Save</button>

                </form>
        <?php
        }
    }
        ?>
            </div>
</body>

</html>