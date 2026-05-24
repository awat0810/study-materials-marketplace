<?php
require'../connection/conn.php';
$id=$_GET['id'];
$del="delete from `stage_subject` where `stage_subject_id`='$id'";
$conn->query($del);



echo "<script type='text/javascript'>window.location.href ='stage_subject.php'</script>";


?>