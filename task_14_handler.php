<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");
$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(
	["email" => $email]
);
$user = $statement->fetch(PDO::FETCH_ASSOC);


if (empty($user)) {
	$_SESSION['danger'] = "<div class='alert alert-danger fade show' role='alert'>Неверный логин или пароль</div>";
	header("Location: task_14.php");
} elseif (!password_verify($password, $user['password'])) {
	$_SESSION['danger'] = "<div class='alert alert-danger fade show' role='alert'>Неверный логин или пароль</div>";
	header("Location: task_14.php");
} else {
	$_SESSION['success'] = "<div class='alert alert-success fade show' role='alert'>Здравствуйте, {$email}.</div>";
	header("Location: task_14_1.php");
}