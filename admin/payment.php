<?php
require '../connection/conn.php'; 
require 'admin_menu.php';

$payment_query = "SELECT * FROM `payment`,`teacher`,`user` where `user` = `user_id` and `payment`.`mobile` = `teacher_mobile` order by `current_date` desc";
$payment_result = $conn->query($payment_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment List</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
 
      
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Payment ID</th>
                        <th>Teacher Name</th>
						 <th>Teacher Mobile</th>
                        <th>Register Date</th>
                        <th>Expire Date</th>
						<th>Current Date</th>
						<th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    while($row = mysqli_fetch_array($payment_result)) { ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $row['payment_id']; ?></td>
                        <td><?php echo $row['teacher_name']; ?></td>
						 <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['reg_date']; ?></td>
                        <td><?php echo $row['expire_date']; ?></td>
						 <td><?php echo $row['current_date']; ?></td>
						 <td><?php echo $row['admin_name']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
      
  
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
