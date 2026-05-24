<?php
if(isset($_POST['add'])) {
    require'../connection/conn.php';
    $subject_name = $_POST['subject_name'];
    $subject_add = "INSERT INTO `subjects` (`subject_name`) VALUES ('$subject_name')";
    $conn->query($subject_add);

    echo "<script type='text/javascript'>window.location.href ='subject_list.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Subject</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="subject_name" class="form-label">Name</label>
                    <input type="text" name="subject_name" class="form-control" required> 
                </div>
                <div class="mb-3">
                    <input type="submit" name="add" class="btn btn-primary" value="ADD">
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
