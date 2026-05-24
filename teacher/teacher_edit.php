<?php
require'../connection/conn.php';

if(isset($_POST['edit']))
{
	require'../connection/conn.php';
	$id_teacher = $_POST['id_teacher'];
	$teacher_name=$_POST['teacher_name'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	$image=$_POST['image'];
	$certification=$_POST['certification'];
	$specialty=$_POST['specialty'];
	$detail=$_POST['detail'];
	$video=$_POST['video'];
	$facebook=$_POST['facebook'];
	$instagram=$_POST['instagram'];
	$tiktok=$_POST['tiktok'];
	$snap=$_POST['snap'];
	$youtube=$_POST['youtube'];

echo	$teacher_add="UPDATE `teacher` SET `teacher_name`='$teacher_name',`teacher_mobile`='$mobile',`password`='$password',`image`='$image',`certification`='$certification',`specialty`='$specialty',`detail`='$detail',`video`='$video',`facebook`='$facebook',`instagram`='$instagram',`tiktok`='$tiktok',`snap`='$snap',`youtube`='$youtube'  WHERE `teacher_id` = '$id_teacher'";	
		$conn->query($teacher_add);
	echo "<script type='text/javascript'>window.location.href ='teacher_list.php'</script>";
}
$id = $_GET['id'];

$teacher_select="SELECT * FROM `teacher` where `teacher_id` = '$id'";
$teacher_select_r = $conn->query($teacher_select);
$row_teacher_select=mysqli_fetch_array($teacher_select_r);

$specialty_id =$row_teacher_select['specialty'];
$specialty_a="SELECT * FROM `specialty` where`specialty_id` != '$specialty_id' ";
$specialty_a_r=$conn->query($specialty_a);

$specialty="SELECT * FROM `specialty` where `specialty_id` = '$specialty_id' ";
$specialty_r=$conn->query($specialty);
$row_specialty=mysqli_fetch_array($specialty_r);

$certification_id =$row_teacher_select['certification'];
$certification_a="SELECT * FROM `certification` where `certification_id` != '$certification_id'";
$certification_a_r=$conn->query($certification_a);

$certification="SELECT * FROM `certification` where `certification_id` = '$certification_id'";
$certification_r=$conn->query($certification);
$row_certification=mysqli_fetch_array($certification_r)


?>
			
<form action=""method="post">
	<input type="hidden" name="id_teacher" value="<?php echo $row_teacher_select['teacher_id']?>" >
	Name:<input type="text" name="teacher_name" value="<?php echo $row_teacher_select['teacher_name']?>" > <br>
	Mobile:<input type="number" name="mobile"  value="<?php echo $row_teacher_select['mobile']?>" >  <br>
	Password:<input type="text" name="password" value="<?php echo $row_teacher_select['password']?>" >  <br>
	Image:<input type="text" name="image" value="<?php echo $row_teacher_select['image']?>" >  <br>

	Certification:
		<select name="certification">
				<option value="<?php echo $row_certification['certification_id']?>"><?php echo $row_certification['certification_name']?></option>
				
				<?php while($row_certification_a=mysqli_fetch_array($certification_a_r)){?>
				<option value="<?php echo $row_certification_a['certification_id']?>"><?php echo $row_certification_a['certification_name']?></option>
				<?php }?>
				</select><br>
	Specialty:
				<select name="specialty">
			<option value="<?php echo $row_specialty['specialty_id']?>"><?php echo $row_specialty['specialty_name']?></option>
				
				<?php while($row_specialty_a=mysqli_fetch_array($specialty_a_r)){?>
				<option value="<?php echo $row_specialty_a['specialty_id']?>"><?php echo $row_specialty_a['specialty_name']?></option>
				<?php }?>
				</select><br>
	Detail:<input type="text" name="detail" value="<?php echo $row_teacher_select['detail']?>" >  <br>
	Video:<input type="text" name="video" value="<?php echo $row_teacher_select['video']?>" >  <br>
	Facebook:<input type="text" name="facebook" value="<?php echo $row_teacher_select['facebook']?>" >  <br>
	Instagram:<input type="text" name="instagram" value="<?php echo $row_teacher_select['instagram']?>">  <br>
	TikTok:<input type="text" name="tiktok" value="<?php echo $row_teacher_select['tiktok']?>" >  <br>
	Snap:<input type="text" name="snap" value="<?php echo $row_teacher_select['snap']?>" >  <br>
	YouTube:<input type="text" name="youtube" value="<?php echo $row_teacher_select['youtube']?>">  <br>
	
	<input type="submit" name="edit" value="Edit">
</form>