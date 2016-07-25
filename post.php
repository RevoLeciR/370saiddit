<?php include './include/template/header.php';
	if(!isset($_REQUEST)){
		$pid = NULL;
	}else{
		$pid = $_REQUEST['pid'];
	}
	$posts_results = mysqli_query($db,"SELECT * FROM posts JOIN makepost ON posts.pid = makepost.pid JOIN accounts ON makepost.aid = accounts.aid WHERE posts.pid = '$pid'");
	$comments_results = mysqli_query($db,"SELECT * FROM comments LEFT JOIN commentcom ON comments.cid = commentcom.com_cid LEFT JOIN accounts ON comments.created_aid = accounts.aid WHERE comments.refer_pid = '$pid' AND comments.cid NOT IN (SELECT com_cid FROM commentcom) ORDER BY comments.datetime ASC");
	$row = mysqli_fetch_array($posts_results);
	if($aid == $row["aid"]){
		echo "<div><div>Title: ".$row["title"]." - ".$row["createdatetime"]."</div><div>Message: ".$row["text"]."<br><a href=\"editpost.php?pid=".$row["pid"]."&action=delete\" onclick=\"return confirm('Are you sure?')\"  data-ajax=\"false\">DELETE</a><br></div><br><div>";
	}else{
		echo "<div><div>Title: ".$row["title"]." - ".$row["createdatetime"]."</div><div>Message: ".$row["text"]."<br><a href=\"vote.php?pid=".$row["pid"]."&opt=up\"  onclick=\"return confirm('Are you sure?')\" data-ajax=\"false\">UPVOTE</a> / <a href=\"vote.php?pid=".$row["pid"]."&opt=down\"  onclick=\"return confirm('Are you sure?')\" data-ajax=\"false\">DOWNVOTE</a><br></div><br><div>";
	}
	if($comments_results)
		echo 'Comments: <br>';
		while($c_row = mysqli_fetch_array($comments_results)){
			if($c_row["com_cid"] == NULL){
				if($aid == $c_row["aid"]){
					$cid = $c_row["cid"];
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$c_row["username"].': '.$c_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="editpost.php?cid='.$c_row["cid"].'&action=delete"  onclick="return confirm(\'Are you sure?\')">DELETE</a><br>';
					$comments_com_results = mysqli_query($db,"SELECT * FROM comments LEFT JOIN commentcom ON comments.cid = commentcom.com_cid LEFT JOIN accounts ON comments.created_aid = accounts.aid WHERE comments.cid IN (SELECT com_cid FROM commentcom) ORDER BY commentcom.ccid ASC, comments.datetime ASC");
					if($comments_com_results){
						while($cc_row = mysqli_fetch_array($comments_com_results)){
							if($cid == $cc_row['ccid']){
								if($aid == $cc_row["aid"]){
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->'.$cc_row["username"].': '.$cc_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="editpost.php?cid='.$cc_row["cid"].'&action=delete"  onclick="return confirm(\'Are you sure?\' data-ajax="false")">DELETE</a><br>';
								}else{
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->'.$cc_row["username"].': '.$cc_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vote.php?cid='.$cc_row["cid"].'&opt=up"  onclick="return confirm(\'Are you sure?\')">UPVOTE</a> / <a href="vote.php?cid='.$cc_row["cid"].'&opt=down"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">DOWNVOTE</a><br>';
								}
							}
						}
					}
				}else{
					$cid = $c_row["cid"];				
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$c_row["username"].': '.$c_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vote.php?cid='.$c_row["cid"].'&opt=up"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">UPVOTE</a> / <a href="vote.php?cid='.$c_row["cid"].'&opt=down"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">DOWNVOTE</a><br>';
					$comments_com_results = mysqli_query($db,"SELECT * FROM comments LEFT JOIN commentcom ON comments.cid = commentcom.com_cid LEFT JOIN accounts ON comments.created_aid = accounts.aid WHERE comments.cid IN (SELECT com_cid FROM commentcom) ORDER BY commentcom.ccid ASC, comments.datetime ASC");
					if($comments_com_results){
						while($cc_row = mysqli_fetch_array($comments_com_results)){
							if($cid == $cc_row['ccid']){
								if($aid == $cc_row["aid"]){
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->'.$cc_row["username"].': '.$cc_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="editpost.php?cid='.$cc_row["cid"].'&action=delete"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">DELETE</a><br>';
								}else{
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->'.$cc_row["username"].': '.$cc_row["text"].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vote.php?cid='.$cc_row["cid"].'&opt=up"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">UPVOTE</a> / <a href="vote.php?cid='.$cc_row["cid"].'&opt=down"  onclick="return confirm(\'Are you sure?\')" data-ajax="false">DOWNVOTE</a><br>';
								}
							}
						}
					}
				}
			}
	}
echo "</div></div>";
include './include/template/footer.php';?>