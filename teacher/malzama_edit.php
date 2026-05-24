<?php
session_start();
require'../connection/conn.php';
if(isset($_POST['update']))
{	$id=$_POST['id'];
	$title=$_POST['title'];
	$teacher=$_SESSION['teacher_id'];
	$stage=$_POST['stage'];
	$video=$_POST['video'];

	$update = "UPDATE `malzama` SET `malzama_title` = '$title',
               `malzama_stage` = '$stage',
               `malzama_teacher` = '$teacher',
               `video_link` = '$video',
               WHERE `malzama_id` = '$id'";
$conn->query($update);

	
	
echo "<script type='text/javascript'>window.location.href ='malzama_list.php'</script>";

}

$id=$_GET['id'];

$malzama_select="select * from `malzama` where `malzama_id` = '$id'";
$malzama_select_r=$conn -> query($malzama_select);
$row_malzama_select=mysqli_fetch_array($malzama_select_r);



$stage_id = $row_malzama_select['malzama_stage'];
$stages_prev=$conn->query("select * from `stages` WHERE `stage_id` = '$stage_id'");


$row_stage_prev=mysqli_fetch_array($stages_prev);
$stages_r=$conn->query("select * from `stages` WHERE `stage_id` != '$stage_id'");

$subject_id=$row_malzama_select['s']




?>


<?php

?>
<form action=""method="post">
		<input type="hidden" name="id" value="<?php echo $row_malzama_select['malzama_id'] ?>" >
Title:<input type="text" name="title" value="<?php echo $row_malzama_select['malzama_title'] ?>"require><br>
Stage:
	<select name="stage" required>
		<option value="<?php echo $row_stage_prev['stage_id'];?>"><?php echo $row_stage_prev['stage_name'];?></option>
		<?php while($row_stage=mysqli_fetch_array($stages_r)){ ?>
			<option value="<?php echo $row_stage['stage_id'];?>"><?php echo $row_stage['stage_name'];?></option>
		<?php } ?>
	</select><br>
	
Subject:
	<select name="subject" required>
		<option value="<?php echo $row_stage_prev['stage_id'];?>"><?php echo $row_stage_prev['stage_name'];?></option>
		<?php while($row_stage=mysqli_fetch_array($stages_r)){ ?>
			<option value="<?php echo $row_stage['stage_id'];?>"><?php echo $row_stage['stage_name'];?></option>
		<?php } ?>
	</select><br>
	
	
Video:<input type="text" name="video" value="<?php echo $row_malzama_select['video_link'] ?>" ><br>

	<input type="submit" name="update" value="Update">
</form>