<?php 

function get_images () {
	$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");
    $sql = "SELECT * FROM images";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetchALL(PDO::FETCH_ASSOC);
    return $images;
}


function upload_image ($image) {
	$ext = pathinfo($image['name'], PATHINFO_EXTENSION);
	$name = uniqid() . "." . $ext;
	$path = "img/demo/gallery/";
	move_uploaded_file($image['tmp_name'], $path . $name);
	$imagelink = $path . $name;
	
	if (empty($image['name'])) {
		header("Location: /task_16.php");
		exit;
	}

	$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");

	$sql = "INSERT INTO images (image) VALUES ('$imagelink')";
	$statement = $pdo->prepare($sql);
	$statement->execute();
}
