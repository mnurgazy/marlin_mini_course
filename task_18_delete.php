<?php 
require "task_18_handler.php";
$image_id = $_GET['image_id'];

delete_image($image_id);

header("Location: /task_18.php");