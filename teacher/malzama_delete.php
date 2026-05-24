<?php
require'../connection/conn.php';
$id=$_GET['id'];
$del="delete from `malzama` where `malzama_id`='$id'";
$conn->query($del);


echo "<script type='text/javascript'>window.location.href ='certification_list.php'</script>";

?>