<?php 
session_start();

if (!isset($_POST['button'])) {
	$_SESSION['count'] = 0;
} else {
	$_SESSION['count'] ++;
	header("Location: task_13.php");
}



