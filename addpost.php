<?php include './include/template/header.php';
  $ssid = $_REQUEST["ss"];
	//$subs = $_POST["subs"];
	$title = $_POST["title"];
  $aid = $_SESSION['aid'];
	$message = $_POST["message"];	
	$post_matching = mysqli_query($db, "SELECT * FROM posts");
	$num_rows = mysqli_num_rows($post_matching);
	$num_rows = $num_rows + 1;
	mysqli_query($db,"INSERT INTO posts (title, text, ssbelong) VALUES ('$title', '$message', '$ssid')");
	mysqli_query($db,"INSERT INTO makepost (aid, ssid, pid) VALUES ('$aid', '$ssid', '$num_rows')");
	echo "Successfully posted! Going to new back to Subsaiddit";
  header("Refresh:2; url='./posts_list.php?subs=".$ssid."'");
include './include/template/footer.php';?>