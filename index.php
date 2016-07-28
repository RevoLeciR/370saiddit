<?php 
  include "./include/dbconnect.php";
?>

<center>WELCOME TO SAIDDIT</center>
<br>
  <Center>
    <?php
      session_start();
      if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
        echo "<a href='logout.php'>SIGN OUT</a>";
      } else {
        echo "<a href='login.html'>LOGIN</a> | <a href='registration.html'> SIGN UP</a>";
      }
    ?>
    <?php
      echo !isset($_SESSION['login']); //will echo 1 if not logged in, blank if logged in
      
      if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
        echo "<br>logged<br>"; 
      } else {
        echo "<br> not logged<br>";
      }
    ?>
  </Center>

  <br>
<?php 
  //include "./include/dbconnect.php";
  $x = 10;
  echo $x;
  echo "<br>hi " . $x . "<br>";
  //$y = mysqli_query($db, "SELECT COUNT(pid) as total FROM posts");
  $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(pid) as total FROM posts"));
  echo $result['total'] . " posts in Posts table.<br>";
  
  $test = mysqli_fetch_assoc(mysqli_query($db, "SELECT aid as acc from accounts"));
  echo $test['acc'] . "<br>";
  
  $max = 3; //max posts in 1 page
  $curr = 0; //counter for the amount of posts
  
  echo "<table style='width:100%'><th>Posts</th><th>SubSaiddit</th><th># of Comments</th><th>Votes</th><th>Create time</th><th>Created by</th>";
  $arr = mysqli_query($db, "SELECT * FROM posts ORDER BY (upvote-downvote) DESC");
  while ($rows = mysqli_fetch_array($arr) and $curr < $max) {
    $belong = $rows['ssbelong'];
    $id = $rows['pid'];
    $ss = mysqli_fetch_assoc(mysqli_query($db, "SELECT subsaiddit.title FROM subsaiddit WHERE ssid = '$belong' "));
    $numcom = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) as num from comments where comments.refer_pid = '$id'"));
    $totalvote = $rows['upvote'] - $rows['downvote'];
    //$by = mysqli_fetch_assoc(mysqli_query($db, "SELECT accounts.username FROM Accounts JOIN  ON Accounts.aid 
    echo "<tr><td><center>" . $rows['title'] . "</td><td><center>" . $ss['title']. "</td><td><center>" . $numcom['num'] . "</td><td><center>" . $totalvote . "</td><td><center>" . $rows['createdatetime'] . "</td><td><center>" . "</td></tr>";
    $curr++;
  }
  //echo $belong;
  echo "</table>";
?>