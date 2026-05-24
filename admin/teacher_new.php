<?php
require'../connection/conn.php';
session_start();
$user = $_SESSION['user_id'];
if(isset($_POST['add']))
{
    $target_dir = "../image/teacher_image/";
    $timestamp = date("Y-m-d_H-i-s"); 
    $file_name = $timestamp . "_" . basename($_FILES["image"]["name"]);

    if (!empty($_FILES["image"]["name"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
            $image = $file_name;
        } else {
            $image = " upload fails"; 
        }
    } else {
        $image = " no file "; 
    }

    $teacher_name=$_POST['teacher_name'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $certification=$_POST['certification'];
    $specialty=$_POST['specialty'];
    $detail=$_POST['detail'];
    $video=$_POST['video'];
    $facebook=$_POST['facebook'];
    $instagram=$_POST['instagram'];
    $tiktok=$_POST['tiktok'];
    $snap=$_POST['snap'];
    $youtube=$_POST['youtube'];
	$reg_date=$_POST['reg_date'];
	$expire_date=$_POST['expire_date'];

    echo $teacher_add="INSERT INTO `teacher`(`teacher_name`, `teacher_mobile`, `password`,`image`,`certification`, `specialty`, `detail`, `video`, `facebook`, `instagram`, `tiktok`, `snap`, `youtube`,`reg_date`,`expire_date`) VALUES
                                        ('$teacher_name','$mobile','$password','$image','$certification','$specialty','$detail','$video','$facebook','$instagram','$tiktok','$snap','$youtube','$reg_date','$expire_date')";
   if( $conn->query($teacher_add)){
	
	$payment_add="INSERT INTO `payment`(`mobile`, `reg_date`, `expire_date`, `user`) VALUES (' $mobile','$reg_date','$expire_date','$user')";
   $conn -> query($payment_add);}
	
    echo "<script type='text/javascript'>window.location.href ='teacher_list.php'</script>";
}

$specialty="SELECT * FROM `specialty`";
$specialty_r=$conn->query($specialty);

$certification="SELECT * FROM `certification`";
$certification_r=$conn->query($certification);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Teacher</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="teacher_name" class="form-label">Name</label>
                    <input type="text" name="teacher_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" name="mobile" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="certification" class="form-label">Certification</label>
                    <select name="certification" class="form-select">
                        <option></option>
                        <?php while($row_certification=mysqli_fetch_array($certification_r)) { ?>
                            <option value="<?php echo $row_certification['certification_id']?>"><?php echo $row_certification['certification_name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty</label>
                    <select name="specialty" class="form-select">
                        <option></option>
                        <?php while($row_specialty=mysqli_fetch_array($specialty_r)) { ?>
                            <option value="<?php echo $row_specialty['specialty_id']?>"><?php echo $row_specialty['specialty_name']?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">Detail</label>
                    <input type="text" name="detail" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="video" class="form-label">Video</label>
                    <input type="text" name="video" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="tiktok" class="form-label">TikTok</label>
                    <input type="text" name="tiktok" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="snap" class="form-label">Snap</label>
                    <input type="text" name="snap" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="youtube" class="form-label">YouTube</label>
                    <input type="text" name="youtube" class="form-control">
                </div>
				<div class="mb-3">
					<label for="reg_date" class="form-label">Registration Date</label>
					<input type="date" name="reg_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
				</div>
				
				 <div class="mb-3">
					<label for="expire_date" class="form-label">Expiration Date</label>
					<input type="date" name="expire_date" class="form-control" required>
				</div>


				<div class="mb-3">
                    <input type="submit" name="add" class="btn btn-primary" value="ADD">
					<a href="teacher_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>


</body>
</html>
