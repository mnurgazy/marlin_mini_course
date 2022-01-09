<?php 
require "task_18_handler.php";
$image = $_FILES['image'];

$total_files = count($image['name']);

for ($key=0; $key < $total_files; $key++) {
	upload_image ($image['name'][$key], $image['tmp_name'][$key]);
}

header("Location: /task_18.php");
