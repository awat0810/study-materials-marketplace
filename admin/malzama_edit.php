<?php
session_start();
require'../connection/conn.php';

if (isset($_POST['update'])) {
    $stage = $_POST['stage'];
    $subject = $_POST['subject'];

    $get_s_s = "SELECT * FROM `stage_subject` WHERE `stage` = $stage AND `subject` = $subject";
    $r = $conn->query($get_s_s);
    $row_s_s = mysqli_fetch_array($r);
    $s_s = $row_s_s['stage_subject_id'];

    $id = $_POST['id'];
    $query = "SELECT malzama_image FROM malzama WHERE malzama_id = '$id'";
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    $old_image = $row['malzama_image'];

    $target_dir = "../image/malzama_image/";
    $new_image = $old_image;

    if (!empty($_FILES["image"]["name"])) {
        $timestamp = date("Y-m-d_H-i-s");
        $image_name = $timestamp . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if (!empty($old_image) && file_exists($target_dir . $old_image)) {
                unlink($target_dir . $old_image);
            }
            $new_image = $image_name;
        } else {
            $new_image = $old_image;
        }
    } else {
        $new_image = $old_image;
    }

    $title = $_POST['title'];
    $teacher = $_POST['teacher'];
    $stage_subject = $s_s;
    $video = $_POST['video'];
    $purchase = $_POST['purchase'];
    $sell = $_POST['sell'];
    $availability = $_POST['availability'];
$photocopy_options = [];
if (isset($_POST['las'])) {
    $photocopy_options[] = 'las';
}
if (isset($_POST['sam'])) {
    $photocopy_options[] = 'sam';
}
$photocopy_options_str = implode(",", $photocopy_options);  


 $update = "UPDATE `malzama` SET `malzama_title`='$title', `malzama_stage_subject`='$s_s',
                `malzama_teacher`='$teacher', `video_link`='$video', `sell_price`='$sell', `purchase_price`='$purchase',
                `availability`='$availability', `malzama_image`='$new_image', `photocopy`='$photocopy_options_str'
                WHERE `malzama_id` = '$id'";

    $conn->query($update);

   echo "<script type='text/javascript'>window.location.href ='malzama_list.php'</script>";
}

$id = $_GET['id'];

$malzama_list_r = $conn->query("SELECT * FROM `malzama` WHERE `malzama_id` = '$id'");
$row_malzama = mysqli_fetch_array($malzama_list_r);

$stage_subject_id = $row_malzama['malzama_stage_subject'];
$stage_subject_prev = $conn->query("SELECT * FROM `stage_subject` WHERE `stage_subject_id` = '$stage_subject_id'");
$row_stage_subject_prev = mysqli_fetch_array($stage_subject_prev);

$stage_id = $row_stage_subject_prev['stage'];
$subject_id = $row_stage_subject_prev['subject'];
$teacher_id = $row_malzama['malzama_teacher'];

$stages_prev = $conn->query("SELECT * FROM `stages` WHERE `stage_id` = '$stage_id'");
$row_stage_prev = mysqli_fetch_array($stages_prev);

$stages = $conn->query("SELECT * FROM `stages` WHERE `stage_id` != '$stage_id'");

$subjects_prev = $conn->query("SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'");
$row_subject_prev = mysqli_fetch_array($subjects_prev);

$subjects = $conn->query("SELECT * FROM `subjects` WHERE `subject_id` != '$subject_id'");

$teacher_prev = $conn->query("SELECT * FROM `teacher` WHERE `teacher_id` = '$teacher_id'");
$row_teacher_prev = mysqli_fetch_array($teacher_prev);

$teacher = $conn->query("SELECT * FROM `teacher` WHERE `teacher_id` != '$teacher_id'");
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
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Malzama Details</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row_malzama['malzama_id']; ?>">

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row_malzama['malzama_title']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="teacher">Teacher</label>
                    <select class="form-control" id="teacher" name="teacher" required>
                        <option value="<?php echo $row_teacher_prev['teacher_id']; ?>"><?php echo $row_teacher_prev['teacher_name']; ?></option>
                        <?php while ($row_teacher = mysqli_fetch_array($teacher)) { ?>
                            <option value="<?php echo $row_teacher['teacher_id']; ?>"><?php echo $row_teacher['teacher_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="stage">Stage</label>
                    <select class="form-control" id="stage" name="stage" required>
                        <option value="<?php echo $row_stage_prev['stage_id']; ?>"><?php echo $row_stage_prev['stage_name']; ?></option>
                        <?php while ($row_stage = mysqli_fetch_array($stages)) { ?>
                            <option value="<?php echo $row_stage['stage_id']; ?>"><?php echo $row_stage['stage_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="subject">Subjects</label>
                    <select class="form-control" id="subject" name="subject" required>
                        <option value="<?php echo $row_subject_prev['subject_id']; ?>"><?php echo $row_subject_prev['subject_name']; ?></option>
                        <?php while ($row_subject = mysqli_fetch_array($subjects)) { ?>
                            <option value="<?php echo $row_subject['subject_id']; ?>"><?php echo $row_subject['subject_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <br>
                    <label>Current Image:</label>
                    <img src="../image/malzama_image/<?php echo $row_malzama['malzama_image']; ?>" width="100">
                </div>

                <div class="form-group mb-3">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" id="video" name="video" value="<?php echo $row_malzama['video_link']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="purchase">Purchase Price</label>
                    <input type="text" class="form-control" id="purchase" name="purchase" value="<?php echo $row_malzama['purchase_price']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sell">Sell Price</label>
                    <input type="text" class="form-control" id="sell" name="sell" value="<?php echo $row_malzama['sell_price']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Availability</label><br>
                    Available <input type="radio" name="availability" value="1" <?php if ($row_malzama['availability'] == 1) echo 'checked'; ?>>
                    Not Available <input type="radio" name="availability" value="0" <?php if ($row_malzama['availability'] == 0) echo 'checked'; ?>>
                </div>

                <div class="mb-3">
    <label class="form-label">Photocopy Options</label><br>
    <input type="checkbox" id="las" name="las" value="las" <?php if ($row_malzama['photocopy'] == 'las' || $row_malzama['photocopy'] == 'las,sam') echo 'checked'; ?>>
    <label for="las">Las Photocopy</label><br>
    <input type="checkbox" id="sam" name="sam" value="sam" <?php if ($row_malzama['photocopy'] == 'sam' || $row_malzama['photocopy'] == 'las,sam') echo 'checked'; ?>>
    <label for="sam">Sam Photocopy</label>
			</div>

                <div class="form-group">
                    <input type="submit" name="update" class="btn btn-primary" value="Update">
					<a href="malzama_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
