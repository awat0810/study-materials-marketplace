<?php
require 'include/header.php';
$conn->query("INSERT INTO `orders`( `mobile`) VALUES ('$mob')");

$order="select max(`order_id`)as order_id from `orders`";
$order_r=$conn->query($order);
$row=mysqli_fetch_array($order_r);
$order_id=$row['order_id'];

$check="select * from basket where   `mobile`='$mob'";
$check_r=$conn->query($check);
while($row=mysqli_fetch_array($check_r))
{
	$m=$row['malzama'];
	$n=$row['number'];
	$conn->query("INSERT INTO `order_item`(`order`, `malzama`, `number`) VALUES ('$order_id','$m','$n')");
}
$up="update `orders` set `progress`=1 where `order_id`=$order_id";
$conn->query($up);

$check="delete from basket where   `mobile`='$mob'";
$check_r=$conn->query($check);

   echo "<script type='text/javascript'>window.location.href ='basket.php'</script>";


?>