<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");

$sql = "SELECT * FROM users WHERE email = :email";
$statement = $pdo->prepare($sql);
$statement->execute(["email" => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($user)) {
	$_SESSION['danger'] = "Этот эл адрес уже занят другим пользователем";
	header("Location: task_11.php");
	exit;
} 

$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email,
					 'password' => password_hash($password, PASSWORD_DEFAULT)]);

$_SESSION['success'] = "Поздравляем! Вы успешно зарегистрировались.";
header("Location: task_11.php");
exit;