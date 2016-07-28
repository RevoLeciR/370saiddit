<?php include './include/template/header.php';
	$subs = $_REQUEST['subs'];
  $ssname = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM subsaiddit WHERE ssid = '$subs' "));
  echo "<center><br> Welcome to the <font color='blue'><b> " . $ssname['title'] . "</b></font> SubSaiddit!<br><br>";
	$posts_results = mysqli_query($db,"SELECT * FROM posts LEFT JOIN makepost ON posts.pid = makepost.pid LEFT JOIN accounts ON makepost.aid = accounts.aid WHERE ssid = '$subs' ORDER BY posts.createdatetime DESC");
	echo "<table data-role=\"table\" class=\"ui-responsive\" id=\"myTable\"><thead>
    <tr>
      <th>Title</th>
		  <th>Author</th>
		  <th>Post at</th>
      <th>Votes</th>
    </tr>
      </thead><tbody>";
	while($row = mysqli_fetch_array($posts_results)){
    $totalvote = $row['upvote'] - $row['downvote'];
		echo '<tr><td><a href="./post.php?post='.$row["pid"].'">' .$row["title"]. '</a></td><td>'.$row["username"].'</td><td>'.$row["createdatetime"].'</td><td>' .$totalvote.'</td></tr>';
	}
echo "</tbody></table>";
  if (isset($_SESSION['login'])) {
    echo '<br><a href="./posting.php?subs='.$subs.'"  data-ajax="false">New Post</a>';
  } else {
    echo '<br>Login or Sign up to post on this SubSaiddit';
  }
include './include/template/footer.php';?>