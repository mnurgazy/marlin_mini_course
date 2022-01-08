<?php 

function get_images () {
	$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");
    $sql = "SELECT * FROM images";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetchALL(PDO::FETCH_ASSOC);
    return $images;
}

function get_image_by_id ($image_id) {
	$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");
    $sql = "SELECT * FROM images WHERE id = '$image_id'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $images = $statement->fetch(PDO::FETCH_ASSOC);
    return $images;
}

function upload_image ($image) {
	$total_files = count($image['name']);	//Подсчитывает количество элементов массива
		for ($key=0; $key < $total_files; $key++) { 		//Запускаем цикл
				$ext = pathinfo($image['name'][$key], PATHINFO_EXTENSION);
					if (empty($ext)) {
						header("Location: /task_18.php");
						exit;
					}
				$name = uniqid() . "." . $ext;
				$path = "img/demo/gallery/";
				move_uploaded_file($image['tmp_name'][$key], $path . $name);
				$imagelink = $path . $name;

				$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");

				$sql = "INSERT INTO images (image) VALUES ('$imagelink')";
				$statement = $pdo->prepare($sql);
				$statement->execute();
		}
}

function delete_image ($image_id) {
		$image = get_image_by_id ($image_id);

		$pdo = new PDO ("mysql:host=localhost;dbname=my_project", "root", "");

		$sql = "DELETE FROM images WHERE id = $image_id";
		$statement = $pdo->prepare($sql);
		$statement->execute();

		$path = $image['image'];
		unlink($path);

}




