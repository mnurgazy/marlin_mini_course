<?php 

session_start();

session_unset();
session_destroy();

header("Location: task_14.php");
