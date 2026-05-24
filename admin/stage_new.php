<?php
if(isset($_POST['add'])) {
    require'../connection/conn.php';
    $stage_name = $_POST['stage_name'];
    $stage_add = "INSERT INTO `stages` (`stage_name`) VALUES ('$stage_name')";
    $conn->query($stage_add);
    
    echo "<script type='text/javascript'>window.location.href ='stage_list.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stage</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Stage</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="stage_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="stage_name" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="add" value="ADD">
					<a href="stage_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>


</body>
</html>
