<?php
require'../connection/conn.php';

if(isset($_POST['up'])) {
    $certification_id = $_POST['certification_id'];
    $certification_name = $_POST['certification_name'];
    $up = "UPDATE `certification` SET `certification_name`='$certification_name' WHERE `certification_id`='$certification_id'";
    $conn->query($up);

    echo "<script type='text/javascript'>window.location.href ='certification_list.php'</script>";
}

$id = $_GET['id'];
$certification = "SELECT * FROM `certification` WHERE `certification_id`='$id'";
$certification_r = $conn->query($certification);
$row = mysqli_fetch_array($certification_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Certification</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Update Certification</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="certification_id" value="<?php echo $row['certification_id']; ?>"> 
                <div class="mb-3">
                    <label for="certification_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="certification_name" name="certification_name" required value="<?php echo $row['certification_name']; ?>"> 
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="up" value="Update">
					<a href="certification_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
