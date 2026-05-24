<?php
require'../connection/conn.php';
$stage_id=$_GET['id'];
$subjects="select * from `subjects`,`stage_subject` where `subject_id`=`subject` and `stage`=$stage_id";
$subjects_r=$conn->query($subjects);
?>
<table border=1>
	<tr>
		<th>ID</th>
		<th>subject Name</th>
	</tr>
	<?php
	while($row=mysqli_fetch_array($subjects_r))
	{ ?>
			<tr>
				<td><?php echo $row['subject_id'];?></td>
				<td><?php echo $row['subject_name'];?></td>
				<td><a href="teachers.php?id=<?php echo $row['stage_subject_id'];?>">Select</a></td>
			</tr>
	<?php }
	?>
</table>