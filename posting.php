<html>
<head>
	<style>

	.post-card {
	  padding: 40px;
	  width: 274px;
	  background-color: #F7F7F7;
	  margin: 0 auto 10px;
	  border-radius: 2px;
	  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	  overflow: hidden;
	  margin-top: 100px;

	}
	</style>
</head>
<body>
<?php include './include/template/header.php';
	$subsaiddit = $_REQUEST['subs'];
	echo '<div class="post-card">
	<form action="addpost.php?ss='.$subsaiddit.'" method="post" data-ajax="false">
Title: <input type="text" name="title"><br>
Message: <textarea name="message"></textarea><br>
<input type="submit" value="Add post">
</form>';
?>

</body>
</html>
