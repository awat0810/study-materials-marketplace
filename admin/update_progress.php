<?php 
require'../connection/conn.php';
session_start();

$progress = $_SESSION['user_position'] + 1;


$id = $_GET['id'];

echo $update = "UPDATE `orders` SET `progress`= '$progress' WHERE `order_id` = '$id' ";
$update_r = $conn -> query($update);

  echo "<script type='text/javascript'>window.location.href ='order_list.php'</script>";




?>
