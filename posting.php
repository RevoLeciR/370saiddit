<?php include './include/template/header.php';
	$subsaiddet = $_REQUEST['subs'];
	echo '<form action="addpost.php" method="post" data-ajax="false">
	Subs: <input type="text" value="'.$subsaiddet.'" name="subs"  readonly><br>
Title: <input type="text" name="title"><br>
Message: <textarea name="message"></textarea><br>
<input type="submit" value="post">
</form>';
?>