<?php
session_start(); 
require'../connection/conn.php';
$id=$_GET['id'];
$order_item="select * from `order_item`,`malzama`,`orders` where `malzama` = `malzama_id` and `order` = '$id'  and `order`=`order_id`";
$order_item_r=$conn->query($order_item);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Items</title>

   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Orders Items</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Order</th>
					<th>Malzama</th>
					<th>PhotoCopy</th>
                    <th>Number</th>
					<th>Sell price</th>
					<th>Total</th>
                </tr>
            </thead>
            <tbody>
			
            <?php 
			$sum=0;
			while($row = mysqli_fetch_array($order_item_r)) { ?>
                <tr>
                    <td><?php echo $row['order_item_id']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
					<td><?php echo $row['malzama_title']; ?></td>
					<td><?php echo $row['photocopy']; ?></td>
                    <td><?php echo $row['number']; ?></td>
					<td><?php echo $row['sell_price']; ?></td>
                    <td><?php echo number_format($t= $row['sell_price'] *$row['number'],0); $sum+=$t; ?></td>
					<?php $ID = $row['order_id']; 
							$progress = $row['progress'];	?>
					
                </tr>
            <?php } ?>
			<tr>
                  <td colspan="5">
						<?php if ($progress  < 5 ) {?>
					<a href="update_progress.php?id=<?php echo $ID; ?>" class="btn btn-sm btn-success">Send</a><?php  } ?>
						</td>

			<td><?php echo number_format($sum,0); ?></td>
					
					
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
