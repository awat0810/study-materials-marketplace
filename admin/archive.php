<?php
require'../connection/conn.php';
require'admin_menu.php';

$_SESSION['user_position'];
$orders="select * from `orders` where `progress` = 5";
$orders_r=$conn->query($orders);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archive</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Archive items</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mobile</th>
					<th>Date</th>
                    <th>Progress</th>
					<th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($orders_r)) { ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
					<td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['progress']; ?></td>
					<td><a href="order_item.php?id=<?php echo $row['order_id']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
					
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
