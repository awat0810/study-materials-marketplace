<?php 

require'../connection/conn.php';
require'admin_menu.php';
$user = "SELECT * FROM `user`, `position` WHERE `position` = `position_id`";
$user_r = $conn->query($user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
 
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Admin List</h2>
        <a href="admin_add.php" class="btn btn-success">+ Add New Admin</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>User Name</th>
					<th>Mobile</th>
                    <th>Password</th>
                    
                    <th>Position</th>
                    <th>Active</th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($user_r)) { ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['admin_name']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['position_name']; ?></td>
                      <td><?php if($row['active'] == 1){ echo 'Active'; } else { echo 'Deactive'; } ?></td>

						<td>
                            <a href="admin_active.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-primary">Active</a>
                            <a href="admin_deactive.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to Deactive this Admin?')">Deactive</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
