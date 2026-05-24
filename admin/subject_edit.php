<?php
require'../connection/conn.php';
if(isset($_POST['up'])) {
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $up = "UPDATE `subjects` SET `subject_name`='$subject_name' WHERE `subject_id`='$subject_id'";
    $conn->query($up);

    echo "<script type='text/javascript'>window.location.href ='subject_list.php'</script>";
}

$id = $_GET['id'];
$subjects = "SELECT * FROM `subjects` WHERE `subject_id`='$id'";
$subjects_r = $conn->query($subjects);
$row = mysqli_fetch_array($subjects_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Subject</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Update Subject</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>"> 
                <div class="mb-3">
                    <label for="subject_name" class="form-label">Name</label>
                    <input type="text" name="subject_name" class="form-control" required value="<?php echo $row['subject_name']; ?>"> 
                </div>
                <div class="mb-3">
                    <input type="submit" name="up" class="btn btn-primary" value="Update">
					<a href="subject_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>


</body>
</html>
