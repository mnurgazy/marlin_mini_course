<?php 

session_start();

session_unset();
session_destroy();

header("Location: task_15.php");
