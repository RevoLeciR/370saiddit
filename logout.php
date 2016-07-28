<?php
  // set the expiration date to one hour ago
  setcookie("aid", "", time() - 3600);
  //echo "Cookie is deleted.";
  session_start();
  session_destroy();
  header("Location: index.php");
?>