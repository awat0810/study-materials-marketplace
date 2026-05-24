<?php
session_start();
require '../connection/conn.php';

if (isset($_POST['add'])) {

    $target_dir = "../image/malzama_image/";
    $timestamp = date("Y-m-d_H-i-s");
    $file_name = $timestamp . "_" . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
        $image = $file_name;
    } else {
        $image = "";
    }

    $stage = $_POST['stage'];
    $subject = $_POST['subject'];

    $get_s_s = "SELECT * FROM `stage_subject` WHERE `stage` = $stage AND `subject` = $subject";
    $r = $conn->query($get_s_s);
    $row_s_s = mysqli_fetch_array($r);
    $s_s = $row_s_s['stage_subject_id'];

    $title = $_POST['title'];
    $teacher = $_POST['teacher'];
    $video = $_POST['video'];
    $purchase = $_POST['purchase'];
    $sell = $_POST['sell'];
    $availability = isset($_POST['availability']) ? $_POST['availability'] : 0;

    // Handle checkboxes
    $photocopy_options = [];
    if (isset($_POST['las'])) {
        $photocopy_options[] = 'las';
    }
    if (isset($_POST['sam'])) {
        $photocopy_options[] = 'sam';
    }
    $photocopy = implode(",", $photocopy_options); 

    $add = "INSERT INTO `malzama` (`malzama_title`, `malzama_stage_subject`, `malzama_teacher`, `video_link`, `sell_price`, `purchase_price`, `availability`, `malzama_image`, `photocopy`) 
            VALUES ('$title', '$s_s', '$teacher', '$video', '$sell', '$purchase', '$availability', '$image', '$photocopy')";
    $conn->query($add);

    echo "<script type='text/javascript'>window.location.href ='malzama_list.php'</script>";
}

$stages_r = $conn->query("SELECT * FROM `stages`");
$subjects_r = $conn->query("SELECT * FROM `subjects`");
$teacher_r = $conn->query("SELECT * FROM `teacher`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Malzama</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Malzama</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="teacher" class="form-label">Teacher</label>
                    <select class="form-select" name="teacher" required>
                        <option value="" disabled selected>Select Teacher</option>
                        <?php while($row_teacher = mysqli_fetch_array($teacher_r)) { ?>
                            <option value="<?php echo $row_teacher['teacher_id']; ?>"><?php echo $row_teacher['teacher_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stage" class="form-label">Stage</label>
                    <select class="form-select" name="stage" required>
                        <option value="" disabled selected>Select Stage</option>
                        <?php while($row_stage = mysqli_fetch_array($stages_r)) { ?>
                            <option value="<?php echo $row_stage['stage_id']; ?>"><?php echo $row_stage['stage_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <select class="form-select" name="subject" required>
                        <option value="" disabled selected>Select Subject</option>
                        <?php while($row_subject = mysqli_fetch_array($subjects_r)) { ?>
                            <option value="<?php echo $row_subject['subject_id']; ?>"><?php echo $row_subject['subject_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="mb-3">
                    <label for="video" class="form-label">Video Link</label>
                    <input type="text" class="form-control" name="video">
                </div>

                <div class="mb-3">
                    <label for="purchase" class="form-label">Purchase Price</label>
                    <input type="text" class="form-control" name="purchase">
                </div>

                <div class="mb-3">
                    <label for="sell" class="form-label">Sell Price</label>
                    <input type="text" class="form-control" name="sell">
                </div>

                <div class="mb-3">
                    <label class="form-label">Availability</label><br>
                    Available <input type="radio" name="availability" value="1">
                    Not Available <input type="radio" name="availability" value="0">
                </div>

                <div class="mb-3">
                    <label class="form-label">Photocopy Options</label><br>
                    <input type="checkbox" id="las" name="las" value="las">
                    <label for="las">Las Photocopy</label><br>
                    <input type="checkbox" id="sam" name="sam" value="sam">
                    <label for="sam">Sam Photocopy</label>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="add" value="Add">
					<a href="malzama_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
