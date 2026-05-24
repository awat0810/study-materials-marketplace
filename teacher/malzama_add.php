<?php
session_start();
require'../connection/conn.php';
if(isset($_POST['add']))
{
	$title=$_POST['title'];
	$teacher=$_SESSION['teacher_id'];
	$stage=$_POST['stage'];
	$video=$_POST['video'];
	
	$add="insert into `malzama` (`malzama_title`,`malzama_stage`,`malzama_teacher`,`video_link`) values
								('$title','$teacher','$stage','$video')";
	$conn->query($add);

	
	
//echo "<script type='text/javascript'>window.location.href ='malzama_list.php'</script>";

}
$stages_r=$conn->query("select * from `stages`");

$subject_r=$conn -> query("select * from `subjects`");




?>


<?php

?>
<form action=""method="post">

Title:<input type="text" name="title" require><br>
Stage:
	<select name="stage" required>
		<option></option>
		<?php while($row_stage=mysqli_fetch_array($stages_r)){ ?>
			<option value="<?php echo $row_stage['stage_id'];?>"><?php echo $row_stage['stage_name'];?></option>
		<?php } ?>
	</select><br>
Subject:
	<select name="subject" required>
		<option></option>
		<?php while($row_subject=mysqli_fetch_array($subject_r)){ ?>
			<option value="<?php echo $row_stage['subject_id'];?>"><?php echo $row_subject['subject_name'];?></option>
		<?php } ?>
	</select><br>
Video:<input type="text" name="video" require><br>


	<input type="submit" name="add" value="ADD">
</form>