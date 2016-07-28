<?php include './include/template/header.php';
	$action = $_REQUEST['action'];
	$pid = $_REQUEST['pid'];
	//$cid = $_REQUEST['cid'];
	if($action=='delete'){
		if($pid || $_SESSION['admin'] == 1){
			$aid_matching = mysqli_query($db, "SELECT aid FROM makepost WHERE pid='$pid'");
			if(mysqli_num_rows($aid_matching) > 0){
				mysqli_query($db, "DELETE FROM makepost WHERE pid='$pid'");
				mysqli_query($db, "DELETE FROM posts WHERE pid='$pid'");
				mysqli_query($db, "DELETE FROM comments WHERE refer_pid='$pid'");
				echo "Successfully deleted!!";
			}
		} else {
			echo "Error:It's not your post / comment!!You may not delete it!!";
		}
	} else {
    echo "here";
  }
include './include/template/footer.php';?>