<?php

require '../connection/conn.php';
require'admin_menu.php';
$stages = "SELECT * FROM `stages`";
$stages_r = $conn->query($stages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Stages List</h2>
        <a href="stage_new.php" class="btn btn-success">+ Add New Stage</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Stage Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($stages_r)) { ?>
                    <tr>
                        <td><?php echo $row['stage_id']; ?></td>
                        <td><?php echo $row['stage_name']; ?></td>
                        <td>
                            <a href="stage_edit.php?id=<?php echo $row['stage_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="stage_delete.php?id=<?php echo $row['stage_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this stage?')">Delete</a>
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
