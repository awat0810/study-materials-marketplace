<?php
require 'include/header.php';
$stage_id=$_GET['stage_id'];
$subject_id=$_GET['subject_id'];
$teacher_id=$_GET['teacher_id'];
$malzama_id=$_GET['malzama_id'];


$check="select * from basket where `malzama`='$malzama_id' and `mobile`='$mob'";
$check_r=$conn->query($check);
if($row=mysqli_fetch_array($check_r))
{
	$num=$row['number']+1;
	$conn->query("update `basket` set `number`=$num where `malzama`='$malzama_id'and `mobile`='$mob'");
}
else{
$conn->query("INSERT INTO `basket`( `malzama`, `mobile`, `number`) VALUES ('$malzama_id','$mob','1')");
}
echo "<script type='text/javascript'>window.location.href ='malzama.php?stage_id=$stage_id&&subject_id=$subject_id&&teacher_id=$teacher_id#s'</script>";
?>