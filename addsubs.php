<?php include './include/template/header.php';
	$title = $_POST["title"];
	$description = $_POST["description"];
	$member_matching = mysqli_query($db, "SELECT * FROM subsaiddit WHERE (title = '$title')");
	if(mysqli_num_rows($member_matching) == 0){
		mysqli_query($db,"INSERT INTO subsaiddit (title, description, created_aid) VALUES ('$title', '$description', '$aid')");
		echo "New subsaiddit successfully added!";
	}else{
		echo "Subsaiddit exists!";
	}
include './include/template/footer.php';?>