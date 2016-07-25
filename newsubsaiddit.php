<?php include './include/template/header.php';
	echo '<form action="addsubs.php" method="post" data-ajax="false">
Title: <input type="text" name="title"><br>
Description: <textarea name="description"></textarea><br>
<input type="submit" value="add">
</form>';
include './include/template/footer.php';?>