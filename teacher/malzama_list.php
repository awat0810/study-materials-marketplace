<?php
session_start();
$id = $_SESSION['teacher_id'];
require "../connection/conn.php";


		
$malzama = "SELECT * FROM `malzama`,`teacher`,`stage_subject`
			where `malzama_stage_subject`=`stage_subject_id` 
			and `malzama_teacher`=`teacher_id` and '$id' = `malzama_teacher`";
$malzama_r=$conn-> query($malzama);


?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Stage</th>

        <th>Video</th>
      
		<th><a href="malzama_add.php">ADD</a></th>
      
    </tr>
    <?php
    while ($row = mysqli_fetch_array($malzama_r)) { ?>
        <tr>
            <td><?php echo $row['malzama_id']; ?></td>
            <td><?php echo $row['malzama_title']; ?></td>
            <td><?php echo $row['malzama_stage_subject']; ?></td>
       
            <td><?php echo $row['video_link']; ?></td>
            
            <td><a href="malzama_edit.php?id=<?php echo $row['malzama_id']; ?>">Edit</a></td>
			<td><a href="malzama_delete.php?id=<?php echo $row['malzama_id']; ?>">Delete</a></td>
      
        </tr>
    <?php } ?>
</table>
