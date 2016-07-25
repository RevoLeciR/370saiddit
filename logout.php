<?php include './include/template/header.php';
// set the expiration date to one hour ago
setcookie("aid", "", time() - 3600);
echo "Cookie is deleted.";
include './include/template/footer.php';?>