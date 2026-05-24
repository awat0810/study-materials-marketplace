<?php
require'../connection/conn.php';
$stages="select * from `stages`";
$stages_r=$conn->query($stages);
?>
<table border=1>
	<tr>
		<th>ID</th>
		<th>Stage Name</th>
	</tr>
	<?php
	while($row=mysqli_fetch_array($stages_r))
	{ ?>
			<tr>
				<td><?php echo $row['stage_id'];?></td>
				<td><?php echo $row['stage_name'];?></td>
				<td><a href="subjects.php?id=<?php echo $row['stage_id'];?>">Select</a></td>
			</tr>
	<?php }
	?>
</table>