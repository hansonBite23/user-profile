<?php
if (isset($_GET['error'])) {
  $_GET['error'] = "Incorrect Username or Password";
  echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '" . $_GET['error'] . "',
        
      })
      </script>
    ";
}
if (isset($_SESSION['success'])) {
  echo "
  <script>
  Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '" . $_SESSION['success'] . "',
  });
  </script>
  ";
  unset($_SESSION['success']);
}
