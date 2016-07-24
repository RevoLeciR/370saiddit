<?php include './include/template/header.php';
	if(!isset($_REQUEST)){
		$pid = NULL;
	}else{
		$pid = $_REQUEST['pid'];
	}
	$posts_results = mysqli_query($db,"SELECT * FROM posts JOIN makepost ON posts.pid = makepost.pid JOIN accounts ON makepost.aid = accounts.aid WHERE posts.pid = '$pid'");
	$comments_results = mysqli_query($db,"SELECT * FROM comments LEFT JOIN commentcom ON comments.cid = commentcom.com_cid LEFT JOIN accounts ON comments.created_aid = accounts.aid WHERE comments.refer_pid = '$pid' ORDER BY comments.datetime ASC");
	$row = mysqli_fetch_array($posts_results);
	echo "<div><div>Title: ".$row["title"]." - ".$row["createdatetime"]."</div><div>Message: ".$row["text"]."</div><br><div>";
	while($c_row = mysqli_fetch_array($comments_results)){
		if($c_row["com_cid"] == NULL){
			echo 'Comment: '.$c_row["username"].': '.$c_row["text"].'<br>';
		}else{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->'.$c_row["username"].': '.$c_row["text"].'<br>';
		}
	}
echo "</div></div>";
include './include/template/footer.php';?>