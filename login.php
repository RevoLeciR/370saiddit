<?php include './include/template/header.php';
	$username = $_POST["username"];
	$pre_hash = hash("sha256", $_POST["password"])."salting";
	$password = hash("sha256", $pre_hash);
	$member_matching = mysqli_query($db, "SELECT aid FROM accounts WHERE (username = '$username' AND password = '$password')");
	if(mysqli_num_rows($member_matching) > 0){
		$member_retrieve = mysqli_fetch_assoc($member_matching);
		$aid = $member_retrieve['aid'];
		setcookie("aid",$aid,time()+3600);
		echo "Welcome back!!";
	}else{
		echo "Error:Account not exists!!";
	}
include './include/template/footer.php';?>