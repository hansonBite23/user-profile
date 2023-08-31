<?php
session_start();
include_once("connect.php");


// echo "Hello ID No.: " . $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    include("error-message.php");
    include("connect.php");

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT `user_id`, `firstname`, `middlename`, `lastname`, `birthday`, (YEAR(CURDATE())-YEAR(`birthday`)) AS age 
                    FROM `user_account` 
                    WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {

            $birthday = date("M d, Y", strtotime($row['birthday']));
    ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <h5><?php echo $row['firstname'] ?></h5>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li>
                                <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container p-3">
                <div class="tbl">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center bg-success title" scope="col" colspan=2>Basic Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="info" scope="row">First Name</th>
                                <td><?php echo $row['firstname']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Middle Name</th>
                                <td><?php echo $row['middlename']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td><?php echo $row['lastname']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Birthday</th>
                                <td><?php echo $birthday; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Age</th>
                                <td><?php echo $row['age']; ?></td>
                            </tr>
                    <?php
                }
            }
                    ?>
                        </tbody>
                    </table>
                    <a href="edit-profile.php?user_id=<?php echo $row['user_id']; ?>&firstname=<?php echo $row['firstname']; ?>"><button class="btn btn-warning">Edit Profile</button></a>
                </div>
            </div>
</body>

</html>