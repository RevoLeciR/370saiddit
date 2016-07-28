<?php 
    //include './include/template/header.php';
    include "./include/dbconnect.php";
	  $username = $_POST["username"];
	  $pre_hash = hash("sha256", $_POST["password"])."salting";
	  $password = hash("sha256", $pre_hash);
	  $member_matching = mysqli_query($db, "SELECT aid FROM accounts WHERE (username = '$username' AND password = '$password')");
	  if(mysqli_num_rows($member_matching) > 0){
		  //$member_retrieve = mysqli_fetch_assoc($member_matching);
		  //$aid = $member_retrieve['aid'];
		  //setcookie("aid",$aid,time()+3600);
      session_start();
      $_SESSION['login'] = 1;
      header("Location: index.php");
	  }else{
		  echo "Error: Account does not exists!! Redirecting in 3 seconds...";
      session_start();
      $_SESSION['login'] = '';
      header("Refresh:3; url=login.html");
      //exit();
	  }
    //include './include/template/footer.php';
 ?>