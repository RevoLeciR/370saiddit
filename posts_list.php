<?php include './include/template/header.php';
	$subs = $_REQUEST['subs'];
	$posts_results = mysqli_query($db,"SELECT * FROM posts LEFT JOIN makepost ON posts.pid = makepost.pid LEFT JOIN accounts ON makepost.aid = accounts.aid WHERE ssid = '$subs' ORDER BY posts.createdatetime DESC");
	echo "<table  data-role=\"table\" class=\"ui-responsive\" id=\"myTable\"><thead>
        <tr>
          <th>Title</th>
		  <th>Author</th>
		  <th>Post at</th>
        </tr>
      </thead><tbody>";
	while($row = mysqli_fetch_array($posts_results)){
		echo '<tr><td><a href="./post.php?pid='.$row["pid"].'"  data-ajax="false">'.$row["title"].'</a></td><td>'.$row["username"].'</td><td>'.$row["createdatetime"].'</td></tr>';
	}
echo "</tbody></table>";
echo '<a href="./posting.php?subs='.$subs.'"  data-ajax="false">New Post</a>';
include './include/template/footer.php';?>