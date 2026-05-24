<?php
session_start();
if (isset($_POST['submit'])) {
    require '../connection/conn.php';
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $check = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
    $check_r = $conn->query($check);
    if ($row = mysqli_fetch_array($check_r)) {
              if ($row['active'] == 0) {
              
                echo "You Are Deactivated!!";
            } else {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['user_position'] = $row['position'];

               
                echo "<script type='text/javascript'>
                        window.location.href = 'admin_home.php'
                      </script>";
            }
    } else {
        echo "Incorrect username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <h3 class="text-center text-primary mb-4">Admin Login</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" name="submit" value="Login" class="btn btn-primary w-100">
            </div>
            <?php if(isset($row) && !$row): ?>
                <div class="alert alert-danger text-center" role="alert">
                    Incorrect username or password.
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
