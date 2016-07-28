<?php 
  include './include/dbconnect.php';
	$username = $_POST["username"];
	$pre_hash = hash("sha256", $_POST["password"])."salting";
	$password = hash("sha256", $pre_hash);
	$member_exists = mysqli_query($db, "SELECT aid FROM accounts WHERE username = '$username'");
  
	if(!$member_exists || mysqli_num_rows($member_exists) == 0){
		mysqli_query($db, "INSERT INTO accounts VALUES ('', '$username', '$password', '', '')");
    echo "Account created";
    header("Location: login.html");
	}else{
		echo "Error: username has been used! Please select another user name. <br> REDIRECTING IN 2 SECS...";
    header("Refresh:2; url=registration.html");
	}
?>