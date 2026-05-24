<?php
require '../connection/conn.php';

$id = $_GET['id'];


echo $image = "SELECT reklam2_image FROM reklam2 WHERE reklam2_id = '$id'";
$image_r = $conn->query($image);
$row = mysqli_fetch_array($image_r);
$img = $row['reklam2_image'];

$target_dir = "../image/reklam_image/";


if (!empty($img) && file_exists($target_dir . $img)) {
    unlink($target_dir . $img);
}


$del = "DELETE FROM reklam2 WHERE reklam2_id = '$id'";
$conn->query($del);

echo "<script type='text/javascript'>window.location.href ='reklam.php'</script>";
?>
