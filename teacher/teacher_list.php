<?php

session_start();
require'../connection/conn.php';
$teacher_id=$_SESSION['teacher_id'];

$teacher="select * from `teacher`,`specialty`,`certification` where `specialty`=`specialty_id` and `certification`=`certification_id` and `teacher_id` = '$teacher_id'";
$teacher_r=$conn->query($teacher);

?>

<table border=1>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Mobile</th>
		<th>Password</th>
		<th>Image</th>
		<th>Certification</th>
		<th>Specialty</th>
		<th>Detail</th>
		<th>Video</th>
		<th>Facebook</th>
		<th>Instagram</th>
		<th>TikTok</th>
		<th>Snap</th>
		<th>YouTube</th>
	</tr>
	<?php
	while($row=mysqli_fetch_array($teacher_r))
	{ ?>
			<tr>
				<td><?php echo $row['teacher_id'];?></td>
				<td><?php echo $row['teacher_name'];?></td>
				<td><?php echo $row['teacher_mobile'];?></td>
				<td><?php echo $row['password'];?></td>
				<td><?php echo $row['image'];?></td>
				<td><?php echo $row['certification_name'];?></td>
				<td><?php echo $row['specialty_name'];?></td>
				<td><?php echo $row['detail'];?></td>
				<td><?php echo $row['video'];?></td>
				<td><?php echo $row['facebook'];?></td>
				<td><?php echo $row['instagram'];?></td>
				<td><?php echo $row['tiktok'];?></td>
				<td><?php echo $row['snap'];?></td>
				<td><?php echo $row['youtube'];?></td>
				<td><a href="teacher_edit.php?id=<?php echo $row['teacher_id'];?>">Edit</a></td>
				
			</tr>
	<?php }
	?>
</table>