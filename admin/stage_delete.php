<?php
require'../connection/conn.php';
$id=$_GET['id'];
$delete="delete from `stages` where `stage_id`='$id'";
$conn->query($delete);

echo "<script type='text/javascript'>window.location.href ='stage_list.php'</script>";

?>