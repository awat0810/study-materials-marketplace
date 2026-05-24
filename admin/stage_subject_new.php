<?php
require'../connection/conn.php';
if(isset($_POST['add'])) {
    $stage = $_POST['stage'];
    $subject = $_POST['subject'];
    $add = "INSERT INTO `stage_subject` (`stage`, `subject`) VALUES ('$stage', '$subject')";
    $conn->query($add);

    echo "<script type='text/javascript'>window.location.href ='stage_subject.php'</script>";
}
$stages_r = $conn->query("SELECT * FROM `stages`");
$subjects_r = $conn->query("SELECT * FROM `subjects`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stage and Subject</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Stage and Subject</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="stage" class="form-label">Stage</label>
                    <select name="stage" class="form-select" required>
                        <option></option>
                        <?php while($row_stage = mysqli_fetch_array($stages_r)) { ?>
                            <option value="<?php echo $row_stage['stage_id']; ?>"><?php echo $row_stage['stage_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <select name="subject" class="form-select" required>
                        <option></option>
                        <?php while($row_subject = mysqli_fetch_array($subjects_r)) { ?>
                            <option value="<?php echo $row_subject['subject_id']; ?>"><?php echo $row_subject['subject_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="add" value="ADD">
					<a href="stage_subject_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>


</body>
</html>
