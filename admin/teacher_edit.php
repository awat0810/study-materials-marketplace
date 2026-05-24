<?php
require '../connection/conn.php';

if(isset($_POST['edit'])) {
    require '../connection/conn.php';

    $id_teacher = $_POST['id_teacher'];

    $query = "SELECT image FROM teacher WHERE teacher_id = '$id_teacher'";
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    $old_image = $row['image'];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../image/teacher_image/";

        $timestamp = date("Y-m-d_H-i-s");
        $file_name = $timestamp . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if (!empty($old_image) && file_exists($target_dir . $old_image)) {
                unlink($target_dir . $old_image);
            }
            $image = $file_name; 
        } else {
            $image = $old_image; 
        }
    } else {
        $image = $old_image; 
    }

    $teacher_name = $_POST['teacher_name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $certification = $_POST['certification'];
    $specialty = $_POST['specialty'];
    $detail = $_POST['detail'];
    $video = $_POST['video'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $tiktok = $_POST['tiktok'];
    $snap = $_POST['snap'];
    $youtube = $_POST['youtube'];

    $teacher_update = "UPDATE `teacher` SET 
        `teacher_name`='$teacher_name',
        `teacher_mobile`='$mobile',
        `password`='$password',
        `image`='$image',
        `certification`='$certification',
        `specialty`='$specialty',
        `detail`='$detail',
        `video`='$video',
        `facebook`='$facebook',
        `instagram`='$instagram',
        `tiktok`='$tiktok',
        `snap`='$snap',
        `youtube`='$youtube'
        WHERE `teacher_id` = '$id_teacher'";

    $conn->query($teacher_update);
	  echo "<script type='text/javascript'>window.location.href ='teacher_list.php'</script>";
}

$id = $_GET['id'];
$teacher_select = "SELECT * FROM `teacher` WHERE `teacher_id` = '$id'";
$teacher_select_r = $conn->query($teacher_select);
$row_teacher_select = mysqli_fetch_array($teacher_select_r);

$specialty_id = $row_teacher_select['specialty'];
$specialty_a = "SELECT * FROM `specialty` WHERE `specialty_id` != '$specialty_id'";
$specialty_a_r = $conn->query($specialty_a);

$specialty = "SELECT * FROM `specialty` WHERE `specialty_id` = '$specialty_id'";
$specialty_r = $conn->query($specialty);
$row_specialty = mysqli_fetch_array($specialty_r);

$certification_id = $row_teacher_select['certification'];
$certification_a = "SELECT * FROM `certification` WHERE `certification_id` != '$certification_id'";
$certification_a_r = $conn->query($certification_a);

$certification = "SELECT * FROM `certification` WHERE `certification_id` = '$certification_id'";
$certification_r = $conn->query($certification);
$row_certification = mysqli_fetch_array($certification_r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Teacher</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_teacher" value="<?php echo $row_teacher_select['teacher_id'] ?>">
                
                <div class="mb-3">
                    <label for="teacher_name" class="form-label">Name</label>
                    <input type="text" name="teacher_name" class="form-control" value="<?php echo $row_teacher_select['teacher_name']; ?>">
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" name="mobile" class="form-control" value="<?php echo $row_teacher_select['teacher_mobile'] ?>">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $row_teacher_select['password'] ?>">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Current Image</label><br>
                    <?php if (!empty($row_teacher_select['image'])) { ?>
                        <img src="../image/teacher_image/<?php echo $row_teacher_select['image']; ?>" width="100"><br>
                    <?php } ?>
                    <label for="image" class="form-label">Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="certification" class="form-label">Certification</label>
                    <select name="certification" class="form-select">
                        <option value="<?php echo $row_certification['certification_id'] ?>"><?php echo $row_certification['certification_name'] ?></option>
                        <?php while ($row_certification_a = mysqli_fetch_array($certification_a_r)) { ?>
                            <option value="<?php echo $row_certification_a['certification_id'] ?>"><?php echo $row_certification_a['certification_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty</label>
                    <select name="specialty" class="form-select">
                        <option value="<?php echo $row_specialty['specialty_id'] ?>"><?php echo $row_specialty['specialty_name'] ?></option>
                        <?php while ($row_specialty_a = mysqli_fetch_array($specialty_a_r)) { ?>
                            <option value="<?php echo $row_specialty_a['specialty_id'] ?>"><?php echo $row_specialty_a['specialty_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">Detail</label>
                    <input type="text" name="detail" class="form-control" value="<?php echo $row_teacher_select['detail'] ?>">
                </div>

                <div class="mb-3">
                    <label for="video" class="form-label">Video</label>
                    <input type="text" name="video" class="form-control" value="<?php echo $row_teacher_select['video'] ?>">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="<?php echo $row_teacher_select['facebook'] ?>">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="<?php echo $row_teacher_select['instagram'] ?>">
                </div>

                <div class="mb-3">
                    <label for="tiktok" class="form-label">TikTok</label>
                    <input type="text" name="tiktok" class="form-control" value="<?php echo $row_teacher_select['tiktok'] ?>">
                </div>

                <div class="mb-3">
                    <label for="snap" class="form-label">Snap</label>
                    <input type="text" name="snap" class="form-control" value="<?php echo $row_teacher_select['snap'] ?>">
                </div>

                <div class="mb-3">
                    <label for="youtube" class="form-label">YouTube</label>
                    <input type="text" name="youtube" class="form-control" value="<?php echo $row_teacher_select['youtube'] ?>">
                </div>

               
				  <div class="form-group">
						<input type="submit" name="edit" class="btn btn-primary" value="Update">
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
