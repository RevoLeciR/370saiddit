<?php include './include/template/header.php';
	$posts_results = mysqli_query($db,"SELECT * FROM posts JOIN makepost ON posts.pid = makepost.pid JOIN accounts ON makepost.aid = accounts.aid ORDER BY posts.createdatetime DESC");
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
include './include/template/footer.php';?>