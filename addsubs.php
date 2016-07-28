<?php include './include/template/header.php';
	$title = $_POST["title"];
	$description = $_POST["description"];
  $aid = $_SESSION['aid'];
	$member_matching = mysqli_query($db, "SELECT * FROM subsaiddit WHERE (title = '$title')");
	if(mysqli_num_rows($member_matching) == 0){
		mysqli_query($db,"INSERT INTO subsaiddit (title, description, created_aid) VALUES ('$title', '$description', '$aid')");
		echo "New subsaiddit successfully added! Going to new Subsaiddit in 2 seconds...";
    $location = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM subsaiddit WHERE title = '$title'"));
    header("Refresh:2; url='./posts_list.php?subs=".$location['ssid']."' ");
	}else{
		echo "Subsaiddit already exists! Please rename it.";
    header("Refresh:2; Location:newsubsaiddit.php");
	}
include './include/template/footer.php';?>