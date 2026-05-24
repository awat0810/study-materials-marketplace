<?php
require '../connection/conn.php';

$id = $_GET['id'];


$image = "SELECT image FROM teacher WHERE teacher_id = '$id'";
$image_r = $conn->query($image);
$row = mysqli_fetch_array($image_r);
$img = $row['image'];

$target_dir = "../image/teacher_image/";


if (!empty($img) && file_exists($target_dir . $img)) {
    unlink($target_dir . $img);
}


$del = "DELETE FROM teacher WHERE teacher_id = '$id'";
$conn->query($del);

echo "<script type='text/javascript'>window.location.href ='teacher_list.php'</script>";
?>
