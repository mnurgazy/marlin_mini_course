<?php 
session_start();

$text = $_POST['text'];


$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");

$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)) {
	$_SESSION['danger'] = 'Введенная запись уже существует';
	header('Location: /task_10.php');
	exit;
}

$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$_SESSION['success'] = 'Введенные данные успешно записаны';
	
header('Location: /task_10.php');