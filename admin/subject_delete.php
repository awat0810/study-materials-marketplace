<?php
require'../connection/conn.php';
$id=$_GET['id'];
$del="delete from `subjects` where `subject_id`='$id'";
$conn->query($del);
echo "<script type='text/javascript'>window.location.href ='subject_list.php'</script>";

?>