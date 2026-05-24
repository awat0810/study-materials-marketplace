<?php 
session_start();

require "../connection/conn.php";
require "admin_menu.php";

echo "         ".$_SESSION['admin_name']."           ".$_SESSION['user_position'] ;

?>

