<?php
require'../connection/conn.php';
if(isset($_POST['up'])) {
    $stage_id = $_POST['stage_id'];
    $stage_name = $_POST['stage_name'];
    $up = "UPDATE `stages` SET `stage_name`='$stage_name' WHERE `stage_id`='$stage_id'";
    $conn->query($up);
    
    echo "<script type='text/javascript'>window.location.href ='stage_list.php'</script>";
}

$id = $_GET['id'];
$stages = "SELECT * FROM `stages` WHERE `stage_id`='$id'";
$stages_r = $conn->query($stages);
$row = mysqli_fetch_array($stages_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stage</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   
   </head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Update Stage</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="stage_id" value="<?php echo $row['stage_id'];?>">
                <div class="mb-3">
                    <label for="stage_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="stage_name" required value="<?php echo $row['stage_name'];?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="up" value="Update">
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
