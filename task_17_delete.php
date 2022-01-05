<?php 
require "task_17_handler.php";
$image_id = $_GET['image_id'];

delete_image($image_id);

header("Location: /task_17.php");