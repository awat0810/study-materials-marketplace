<?php
require '../connection/conn.php';

$id = $_GET['id'];


echo $image = "SELECT reklam3_image FROM reklam3 WHERE reklam3_id = '$id'";
$image_r = $conn->query($image);
$row = mysqli_fetch_array($image_r);
$img = $row['reklam3_image'];

$target_dir = "../image/reklam_image/";


if (!empty($img) && file_exists($target_dir . $img)) {
    unlink($target_dir . $img);
}


$del = "DELETE FROM reklam3 WHERE reklam3_id = '$id'";
$conn->query($del);

echo "<script type='text/javascript'>window.location.href ='reklam.php'</script>";
?>
