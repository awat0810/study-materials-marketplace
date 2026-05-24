<?php
require '../connection/conn.php';
$teacher_id = $_GET['id'];

$teacher = "SELECT * FROM `teacher`, `specialty`, `certification` 
            WHERE `specialty` = `specialty_id` 
            AND `certification` = `certification_id` 
            AND `teacher_id` = '$teacher_id'";
$teacher_r = $conn->query($teacher);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Details</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">👨‍🏫 Teacher Information</h2>

    <?php while($row = mysqli_fetch_array($teacher_r)) { ?>
        <div class="card shadow-lg mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $row['teacher_name']; ?></h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <img src="../image/teacher_image/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="Teacher Image">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped">
                            <tr><th>Mobile</th><td><?php echo $row['teacher_mobile']; ?></td></tr>
                            <tr><th>Certification</th><td><?php echo $row['certification_name']; ?></td></tr>
                            <tr><th>Specialty</th><td><?php echo $row['specialty_name']; ?></td></tr>
                            <tr><th>Detail</th><td><?php echo $row['detail']; ?></td></tr>
                            <tr><th>Video</th><td><a href="<?php echo $row['video']; ?>" target="_blank">Watch Video</a></td></tr>
                            <tr><th>Facebook</th><td><a href="<?php echo $row['facebook']; ?>" target="_blank"><?php echo $row['facebook']; ?></a></td></tr>
                            <tr><th>Instagram</th><td><a href="<?php echo $row['instagram']; ?>" target="_blank"><?php echo $row['instagram']; ?></a></td></tr>
                            <tr><th>TikTok</th><td><a href="<?php echo $row['tiktok']; ?>" target="_blank"><?php echo $row['tiktok']; ?></a></td></tr>
                            <tr><th>Snap</th><td><a href="<?php echo $row['snap']; ?>" target="_blank"><?php echo $row['snap']; ?></a></td></tr>
                            <tr><th>YouTube</th><td><a href="<?php echo $row['youtube']; ?>" target="_blank"><?php echo $row['youtube']; ?></a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
