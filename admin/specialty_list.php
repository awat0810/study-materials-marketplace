<?php
require '../connection/conn.php';
require'admin_menu.php';
$specialty = "SELECT * FROM `specialty`";
$specialty_r = $conn->query($specialty);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Specialty List</title>

 <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Specialty List</h2>
        <a href="specialty_new.php" class="btn btn-success btn-lg">+ Add New</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Specialty Name</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_array($specialty_r)) { ?>
                <tr>
                    <td><?php echo $row['specialty_id']; ?></td>
                    <td><?php echo $row['specialty_name']; ?></td>
                    <td>
                        <a href="specialty_edit.php?id=<?php echo $row['specialty_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="specialty_delete.php?id=<?php echo $row['specialty_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
