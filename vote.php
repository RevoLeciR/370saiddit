<?php include './include/template/header.php';
	$opt = $_REQUEST['opt'];
	$pid = $_REQUEST['pid'];
	$cid = $_REQUEST['cid'];
	if($opt=='up'){
		if($pid){
			$aid_matching = mysqli_query($db, "SELECT aid FROM makepost WHERE aid='$aid' AND pid='$pid'");
			$voted_matching = mysqli_query($db, "SELECT aid, pid FROM accpostvote WHERE aid='$aid' AND pid='$pid'");
			if(mysqli_num_rows($voted_matching) == 0){
				if(mysqli_num_rows($aid_matching) == 0){
					mysqli_query($db, "UPDATE posts SET upvote = upvote+1 WHERE pid='$pid'");
					mysqli_query($db, "INSERT INTO accpostvote (aid, pid) VALUES ('$aid', '$pid')");
					echo "Successfully voted!!";
				}else{
					echo "ERR1";
				}
			}else{
				echo "You voted before!!";
			}
		}elseif($cid){
			$aid_matching = mysqli_query($db, "SELECT created_aid FROM comments WHERE created_aid = '$aid' AND cid='$cid'");
			$voted_matching = mysqli_query($db, "SELECT aid, cid FROM acccomvote WHERE aid='$aid' AND cid='$cid'");
			if(mysqli_num_rows($voted_matching) == 0){
				if(mysqli_num_rows($aid_matching) == 0){
					mysqli_query($db, "UPDATE comments SET upvote = upvote+1 WHERE cid='$cid'");
					mysqli_query($db, "INSERT INTO acccomvote (aid, cid) VALUES ('$aid', '$cid')");
					echo "Successfully voted!!";
				}else{
					echo "ERR2";
				}
			}else{
				echo "You voted before!!";
			}
		}else{
			echo "Error:It's your post / comment!!You may not vote it!!";
		}
	}elseif($opt=='down'){
		if($pid){
			$aid_matching = mysqli_query($db, "SELECT aid FROM makepost WHERE aid='$aid' AND pid='$pid'");
			$voted_matching = mysqli_query($db, "SELECT aid, pid FROM accpostvote WHERE aid='$aid' AND pid='$pid'");
			if(mysqli_num_rows($voted_matching) == 0){
				if(mysqli_num_rows($aid_matching) == 0){
					mysqli_query($db, "UPDATE posts SET downvote = downvote+1 WHERE pid='$pid'");
					mysqli_query($db, "INSERT INTO accpostvote (aid, pid) VALUES ('$aid', '$pid')");
					echo "Successfully voted!!";
				}else{
					echo "ERR3";
				}
			}else{
				echo "You voted before!!";
			}
		}elseif($cid){
			$aid_matching = mysqli_query($db, "SELECT created_aid FROM comments WHERE created_aid = '$aid' AND cid='$cid'");
			$voted_matching = mysqli_query($db, "SELECT aid, cid FROM acccomvote WHERE aid='$aid' AND cid='$cid'");
			if(mysqli_num_rows($voted_matching) == 0){
				if(mysqli_num_rows($aid_matching) == 0){
					mysqli_query($db, "UPDATE comments SET downvote = downvote+1 WHERE cid='$cid'");
					mysqli_query($db, "INSERT INTO acccomvote (aid, cid) VALUES ('$aid', '$cid')");
					echo "Successfully voted!!";
				}else{
					echo "ERR4";
				}
			}else{
				echo "You voted before!!";
			}
		}else{
			echo "Error:It's your post / comment!!You may not vote it!!";
		}
	}else{
		echo "!!??";
	}
?>