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
  
  $test = mysqli_fetch_assoc(mysqli_query($db, "SELECT aid as acc from accounts"));
  echo $test['acc'] . "<br>";
  
  echo "<table style='width:100%'><th>Posts</th><th>SubSaiddit</th><th># of Comments</th><th>Votes</th><th>Create time</th>";
  $arr = mysqli_query($db, "SELECT * FROM posts ORDER BY posts.createdatetime DESC");
  while ($rows = mysqli_fetch_array($arr)) {
    $belong = $rows['ssbelong'];
    $id = $rows['pid'];
    $ss = mysqli_fetch_assoc(mysqli_query($db, "SELECT subsaiddit.title FROM subsaiddit WHERE ssid = '$belong' "));
    $numcom = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as num from comments where comments.refer_pid = '$id'"));
    $totalvote = $rows['upvote'] - $rows['downvote'];
    echo "<tr><td><center>" . $rows['title'] . "</td><td><center>" . $ss['title']. "</td><td><center>" . $numcom['num'] . "</td><td><center>" . $totalvote . "</td><td><center>" . $rows['createdatetime'] . "</td></tr>";
  }
  //echo $belong;
  echo "</table>";
?>