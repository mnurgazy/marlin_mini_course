<?php 
require "task_16_handler.php";

$image = $_FILES['image'];

upload_image ($image);

header("Location: /task_16.php");
