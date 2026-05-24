<?php
require'../connection/conn.php';
require'admin_menu.php';
$certification="select * from `certification`";
$certification_r=$conn->query($certification);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certifications</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Certification List</h2>
        <a href="certification_new.php" class="btn btn-success">+ Add New</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Certification Name</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($certification_r)) { ?>
                <tr>
                    <td><?php echo $row['certification_id']; ?></td>
                    <td><?php echo $row['certification_name']; ?></td>
                    <td><a href="certification_edit.php?id=<?php echo $row['certification_id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                    <td><a href="certification_delete.php?id=<?php echo $row['certification_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
