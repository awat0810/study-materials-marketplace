<?php
require "../connection/conn.php";

$id = $_GET['id'];


$image = "SELECT malzama_image FROM `malzama` WHERE `malzama_id` = '$id'";
$image_r = $conn->query($image);
$row = mysqli_fetch_array($image_r);
$img = $row['malzama_image'];

$target_dir = "../image/malzama_image/"; 


if (!empty($img) && file_exists($target_dir . $img)) {
    unlink($target_dir . $img);
}


 echo $delete = "DELETE FROM `malzama` WHERE `malzama_id` = '$id'";
$conn->query($delete);


  echo "<script type='text/javascript'>window.location.href ='malzama_list.php'</script>";
?>
