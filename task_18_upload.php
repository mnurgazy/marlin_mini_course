<?php 
require "task_18_handler.php";
$image = $_FILES['image'];

upload_image ($image);

header("Location: /task_18.php");