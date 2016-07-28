<?php include './include/template/header.php';
	$posts_results = mysqli_query($db,"SELECT * FROM subsaiddit ORDER BY ssid ASC");
	echo "<table  data-role=\"table\" class=\"ui-responsive\" id=\"myTable\"><thead>
        <tr>
          <th>Title</th>
		  <th>Description</th>
        </tr>
      </thead><tbody>";
	while($row = mysqli_fetch_array($posts_results)){
		echo '<tr><td><a href="./posts_list.php?subs='.$row["ssid"].'"  data-ajax="false">'.$row["title"].'</a></td><td>'.$row["description"].'</td></tr>';
	}
echo "</tbody></table>";
echo '<br><a href="./newsubsaiddit.php"  data-ajax="false">Create New Subsaiddit</a>';
?>