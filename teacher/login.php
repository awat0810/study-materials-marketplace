<?php 
session_start();

if (isset($_POST['login'])) {
    require '../connection/conn.php';

    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $query = "SELECT * FROM teacher WHERE teacher_mobile='$mobile' AND password='$password'";
    $result = $conn->query($query);

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['teacher_name'] = $row['teacher_name'];
        $_SESSION['mobile'] = $row['mobile'];

        header('Location: home_page.php');
        exit;
    } else {
        echo "Incorrect mobile or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label>Mobile:</label>
        <input type="number" name="mobile" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
