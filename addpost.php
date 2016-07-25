<?php include './include/template/header.php';
	$subs = $_POST["subs"];
	$title = $_POST["title"];
	$message = $_POST["message"];	
	$post_matching = mysqli_query($db, "SELECT * FROM posts");
	$num_rows = mysqli_num_rows($post_matching);
	$num_rows = $num_rows + 1;
	mysqli_query($db,"INSERT INTO posts (title, text, ssbelong) VALUES ('$title', '$message', '$subs')");
	mysqli_query($db,"INSERT INTO makepost (aid, ssid, pid) VALUES ('$aid', '$subs', '$num_rows')");
	echo "Successfully posted!";
include './include/template/footer.php';?>