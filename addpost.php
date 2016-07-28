<?php include './include/template/header.php';
  $ssid = $_REQUEST["ss"];
	//$subs = $_POST["subs"];
	$title = $_POST["title"];
  $aid = $_SESSION['aid'];
	$message = $_POST["message"];	
	$post_matching = mysqli_query($db, "SELECT * FROM posts");
  
	mysqli_query($db,"INSERT INTO posts (title, text, ssbelong) VALUES ('$title', '$message', '$ssid')");
  $newpost = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE title = '$title'"));
  $pid = $newpost['pid'];
  //echo $pid;
	mysqli_query($db,"INSERT INTO makepost (aid, ssid, pid) VALUES ('$aid', '$ssid', '$pid')");
	echo "Successfully posted! Going to new back to Subsaiddit";
  header("Refresh:3; url='./posts_list.php?subs=".$ssid."'");
include './include/template/footer.php';?>