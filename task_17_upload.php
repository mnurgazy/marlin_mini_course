<?php 
require "task_17_handler.php";

$image = $_FILES['image'];

upload_image ($image);

header("Location: /task_17.php");