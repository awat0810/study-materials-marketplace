<?php
require '../connection/conn.php';
require'admin_menu.php';
$teacher = "SELECT * FROM `teacher`, `specialty`, `certification` 
            WHERE `specialty` = `specialty_id` AND `certification` = `certification_id`";
$teacher_r = $conn->query($teacher);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers List</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Teachers List</h2>
        <a href="teacher_new.php" class="btn btn-success">+ Add New Teacher</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Certification</th>
                    <th>Specialty</th>
                    <th>Detail</th>
                    <th>Video</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>TikTok</th>
                    <th>Snap</th>
                    <th>YouTube</th>
					<th>Register Date</th>
					<th>Expire Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($teacher_r)) { ?>
                    <tr>
                        <td><?php echo $row['teacher_id']; ?></td>
                        <td><?php echo $row['teacher_name']; ?></td>
                        <td><?php echo $row['teacher_mobile']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><img src='../image/teacher_image/<?php echo $row['image']; ?>' alt='image' width="100px"></td>
                        <td><?php echo $row['certification_name']; ?></td>
                        <td><?php echo $row['specialty_name']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['video']; ?></td>
                        <td><?php echo $row['facebook']; ?></td>
                        <td><?php echo $row['instagram']; ?></td>
                        <td><?php echo $row['tiktok']; ?></td>
                        <td><?php echo $row['snap']; ?></td>
                        <td><?php echo $row['youtube']; ?></td>
						<td><?php echo $row['reg_date']; ?></td>
                        <td><?php echo $row['expire_date']; ?></td>
                        <td>
                            <a href="teacher_edit.php?id=<?php echo $row['teacher_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="teacher_delete.php?id=<?php echo $row['teacher_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</a>
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
