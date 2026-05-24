<?php
if(isset($_POST['add'])) {
    require'../connection/conn.php';
    $specialty_name = $_POST['specialty_name'];
    $specialty_add = "INSERT INTO `specialty` (`specialty_name`) VALUES ('$specialty_name')";
    $conn->query($specialty_add);
    
    echo "<script type='text/javascript'>window.location.href ='specialty_list.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Specialty</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Specialty</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="specialty_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="specialty_name" name="specialty_name" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="add" value="ADD">
					<a href="specialty_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
