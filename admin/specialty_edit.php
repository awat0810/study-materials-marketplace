<?php
require'../connection/conn.php';
if(isset($_POST['up'])) {
    $specialty_id = $_POST['specialty_id'];
    $specialty_name = $_POST['specialty_name'];
    $up = "UPDATE `specialty` SET `specialty_name` = '$specialty_name' WHERE `specialty_id` = '$specialty_id'";
    $conn->query($up);

    echo "<script type='text/javascript'>window.location.href ='specialty_list.php'</script>";
}

$id = $_GET['id'];
$specialty = "SELECT * FROM `specialty` WHERE `specialty_id` = '$id'";
$specialty_r = $conn->query($specialty);
$row = mysqli_fetch_array($specialty_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Specialty</title>
	
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Update Specialty</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="specialty_id" value="<?php echo $row['specialty_id']; ?>">
                <div class="mb-3">
                    <label for="specialty_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="specialty_name" name="specialty_name" required value="<?php echo $row['specialty_name']; ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="up" value="Update">
					<a href="specialty_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
