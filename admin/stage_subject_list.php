<?php
require '../connection/conn.php';
require'admin_menu.php';
$s_s = "SELECT * FROM `stage_subject`,`stages`,`subjects` WHERE `stage`=`stage_id` AND `subject`=`subject_id`";
$s_s_r = $conn->query($s_s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage Subjects</title>
	
	<link rel="stylesheet" href="../css/bootstrap.min.css"><link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Stage Subjects List</h2>
        <a href="stage_subject_new.php" class="btn btn-success">+ Add New Stage Subject</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Stage Name</th>
                    <th>Subject Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($s_s_r)) { ?>
                    <tr>
                        <td><?php echo $row['stage_subject_id']; ?></td>
                        <td><?php echo $row['stage_name']; ?></td>
                        <td><?php echo $row['subject_name']; ?></td>
                        <td>
                            <a href="stage_subject_delete.php?id=<?php echo $row['stage_subject_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
