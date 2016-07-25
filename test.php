<?php include './include/template/header.php';
		$post_matching = mysqli_query($db, "SELECT * FROM posts");
		$num_rows = mysqli_num_rows($post_matching);
		$num_rows = $num_rows + 1;
		echo $num_rows;
include './include/template/footer.php';?>