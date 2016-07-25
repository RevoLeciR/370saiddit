<center>WELCOME TO SAIDDIT</center>
<br>
  <Center>
    <a href="login.html">LOGIN</a> | <a href="registration.html"> SIGN UP</a>
  </Center>

  <br>
<?php 
  include "./include/dbconnect.php";
  #
  $x = 10;
  echo $x;
  echo "<br>hi " . $x . "<br>";
  //$y = mysqli_query($db, "SELECT COUNT(pid) as total FROM posts");
  $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(pid) as total FROM posts"));
  echo $result['total'] . " posts in Posts table.<br>";
  
  $test = mysqli_fetch_assoc(mysqli_query($db, "SELECT aid as acc from accounts where aid=2"));
  echo $test['acc'] . "<br>";
  
  echo "<table style='width:100%'><th>Posts</th><th>SubSaiddit</th><th># of Comments</th><th>Votes</th>";
  for ($posts = 1; $posts <= 5; $posts++) {
    echo "<tr><td>" . 
  }
  echo "</table>";
?>