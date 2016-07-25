<?php 
    include './include/template/header.php';
	  $username = $_POST["username"];
	  $pre_hash = hash("sha256", $_POST["password"])."salting";
	  $password = hash("sha256", $pre_hash);
	  $member_matching = mysqli_query($db, "SELECT aid FROM accounts WHERE (username = '$username' AND password = '$password')");
	  if(mysqli_num_rows($member_matching) > 0){
		  $member_retrieve = mysqli_fetch_assoc($member_matching);
		  $aid = $member_retrieve['aid'];
		  setcookie("aid",$aid,time()+3600);
		  echo "Welcome back!!";
      header("Location: list.php");
	  }else{
		  echo "Error: Account does not exists!! Redirecting in 3 seconds...";
      
      header("Refresh:3; url=login.html", true, 303);
      exit();
	  }
    include './include/template/footer.php';
 ?>