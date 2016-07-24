<?php include './include/template/header.php';
	$username = $_POST["username"];
	$pre_hash = hash("sha256", $_POST["password"])."salting";
	$password = hash("sha256", $pre_hash);
	$member_exists = mysqli_query($db, "SELECT aid FROM accounts WHERE username = '$member'");
	if(!$member_exists || mysqli_num_rows($member_exists) == 0){
		mysqli_query($db, "INSERT INTO account VALUES ('', '$username', '$password', '', '')");
	}else{
		echo "Error:username has been used!!";
	}
include './include/template/footer.php';?>