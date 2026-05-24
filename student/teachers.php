<?php
require "../connection/conn.php";
$stage_subject_id=$_GET['id'];


$teacher="select * from `teacher`,`specialty`,`certification`,`teacher_stage_subject` where `specialty`=`specialty_id` and `certification`=`certification_id` and `teacher` = `teacher_id`  and `s_s_id` = '$stage_subject_id'";

$teacher_r=$conn -> query($teacher);




?>

<table border=1>
	<tr>
		
		<th>Name</th>
		<th>Password</th>
		<th>Image</th>
		<th>Certification</th>
		<th>Specialty</th>
		
	</tr>
	<?php
	while($row=mysqli_fetch_array($teacher_r))
	{ ?>
			<tr>
		
				<td><?php echo $row['teacher_name'];?></td>
			
				<td><?php echo $row['password'];?></td>
				<td><?php echo $row['image'];?></td>
				<td><?php echo $row['certification_name'];?></td>
				<td><?php echo $row['specialty_name'];?></td>
				<td><a href="teacher_profile.php?id=<?php echo $row['teacher_id'];?>">Detail</a></td>
			
			</tr>
	<?php }
	?>
</table>