<?php 
require'../connection/conn.php';

echo $id = $_GET['id'];

$update = "UPDATE `user` SET `active`= 1 WHERE `user_id` = '$id' ";
$update_r = $conn -> query($update);

  echo "<script type='text/javascript'>window.location.href ='admin_list.php'</script>";




?>
