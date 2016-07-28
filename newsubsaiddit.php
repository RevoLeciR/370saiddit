<html>
<head>
	<style>
	.login-card {
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

	echo '<form action="addsubs.php" method="post" data-ajax="false">
  Title: <input type="text" name="title"><br>
  Description: <textarea name="description"></textarea><br>
  <input type="submit" value="Create New SubSaiddit">
  </form>';
?>

	echo '<div class="login-card">
	<form action="addsubs.php" method="post" data-ajax="false">
	Title: <input type="text" name="title" placeholder="Title"><br>
	Description: <textarea name="description" placeholder="Description"></textarea><br>
	<input type="submit" value="add">
	</form>
	</div>';
include './include/template/footer.php';?>
</body>
</html>

