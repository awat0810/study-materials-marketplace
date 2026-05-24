<?php
require'admin_menu.php';
require "../connection/conn.php";

$malzama = "SELECT * FROM `malzama`, `teacher`, `stage_subject`
            WHERE `malzama_stage_subject`=`stage_subject_id` 
            AND `malzama_teacher`=`teacher_id`";
$malzama_r = $conn->query($malzama);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malzama List</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Malzama List</h2>
        <a href="malzama_add.php" class="btn btn-success btn-lg">+ Add New</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Stage</th>
                    <th>Teacher</th>
                    <th>Video</th>
                    <th>Image</th>
                    <th>Purchase Price</th>
                    <th>Sell Price</th>
                    <th>Availability</th>
					<th>Photocopy</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_array($malzama_r)) { 
				$stage = $row['stage'];  
				$subject = $row['subject'];  
				$stage_subject_sql = "SELECT * FROM `stage_subject`, `stages`, `subjects` WHERE `stage_id` = '$stage' AND `subject_id` = '$subject'";
				$stage_subject_r = $conn->query($stage_subject_sql);
				$stage_subject_row = mysqli_fetch_array($stage_subject_r);

					?>
				
                <tr>
                    <td><?php echo $row['malzama_id']; ?></td>
                    <td><?php echo $row['malzama_title']; ?></td>
                 <td><?php echo $stage_subject_row['subject_name'] . "ی " . $stage_subject_row['stage_name']; ?></td>

                    <td><?php echo $row['teacher_name']; ?></td>
                    <td><?php echo $row['video_link']; ?></td>
                    <td><img src="../image/malzama_image/<?php echo $row['malzama_image']; ?>" width="100" class="table-img" alt="malzama image"></td>
                    <td><?php echo $row['purchase_price']; ?></td>
                    <td><?php echo $row['sell_price']; ?></td>
                    <td><?php echo $row['availability']; ?></td>
					<td><?php echo $row['photocopy']; ?></td>
                    <td>
                        <a href="malzama_edit.php?id=<?php echo $row['malzama_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="malzama_delete.php?id=<?php echo $row['malzama_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
