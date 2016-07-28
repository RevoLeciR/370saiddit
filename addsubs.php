<?php include './include/template/header.php';
	$title = $_POST["title"];
	$description = $_POST["description"];
	$member_matching = mysqli_query($db, "SELECT * FROM subsaiddit WHERE (title = '$title')");
	if(mysqli_num_rows($member_matching) == 0){
		mysqli_query($db,"INSERT INTO subsaiddit (title, description, created_aid) VALUES ('$title', '$description', '$aid')");
		echo "New subsaiddit successfully added! Going to new Subsaiddit in 2 seconds...";
    header("Refresh:2; Location
	}else{
		echo "Subsaiddit already exists! Please rename it.";
    header("Refresh:2; Location:newsubsaiddit.php");
	}
include './include/template/footer.php';?>