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
	$subsaiddet = $_REQUEST['subs'];
	echo '<div class="login-card">
	<form action="addpost.php" method="post" data-ajax="false">
	Subs: <input type="text" value="'.$subsaiddet.'" name="subs"  readonly><br>
	Title: <input type="text" name="title" placeholder="Title"><br>
	Message: <textarea name="message" placeholder="Message"></textarea><br>
	<input type="submit" value="post">
	</form>
	</div>';
include './include/template/footer.php';?>
</body>
</html>