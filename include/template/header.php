<?php include_once "./include/dbconnect.php"; session_start();
if(isset($_COOKIE["aid"])){
	$current = time();
	$aid = $_COOKIE['aid'];
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> Saiddit </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./include/css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="./include/css/style.css">
  <link rel="stylesheet" href="./include/css/jquery.timepicker.css">

  <script src="./include/js/jquery-1.11.1.min.js"></script>
  <script src="./include/js/jquery.mobile-1.4.5.min.js"></script>
  <script src="./include/js/jquery.timepicker.min.js"></script>
  
  <script>
    $( document ).on( "pagecreate", function() {
		$( "body > [data-role='panel']" ).panel();
		$( "body > [data-role='panel'] [data-role='listview']" ).listview();
	});
	$( document ).on( "pageshow", function() {
		$( "body > [data-role='header']" ).toolbar();
		$( "body > [data-role='footer']" ).toolbar();
		$( document ).on( "swiperight", "*", function( e ) {
			if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
				if ( e.type === "swiperight" ) {
					$( "#left-panel" ).panel( "open" );
				}
			}
		});
	});
    </script>
 </head>
 <body>
    <div data-role="header" data-position="fixed" data-theme="b">
        <dt id="header_title"><a href="index.php" style="color:white; text-decoration:none">Saiddit</a></dt>
		<a href="#left-panel" data-icon="carat-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-nodisc-icon">Open left panel</a>
		<div data-role="button" data-type="horizontal" data-role="controlgroup" class="ui-btn-right">  
		<?php
			if (!isset($_SESSION['login'])){
				echo '<a href="./login.html" class="ui-btn ui-btn-b ui-shadow">Sign in</a> <a href="./registration.html" class="ui-btn ui-btn-b ui-shadow">Register</a>'; 		
			} else {
				echo '<a href="logout.php" class="ui-btn ui-corner-all ui-shadow">Log out</a>';
			}
		?>
		</div>
    </div>	

	<div data-role="panel"  data-display="push"  id="left-panel">
		<a href="#" data-rel="close" class="ui-btn ui-corner-all ui-shadow ui-mini ui-btn-inline ui-icon-delete ui-btn-icon-left ui-btn-right">Close</a>
		<br><br>
		<ul data-role="listview" data-theme="b" style="margin-top:0px;" class="nav-search">
			<li data-theme="b" data-filtertext="back to home">
				<a href="./index.php" data-ajax="false">Home</a>
			</li>
			<?php if(!isset($_SESSION['login'])){?>
			<li data-theme="b" data-filtertext="Login Here">				
				<a href="./login.html" data-ajax="false">Login</a>
			</li>
			<li data-theme="b" data-filtertext="Sign up">
				<a href="./registration.html" data-ajax="false">Sign up</a>
			</li>
			<?php }else{?>
			<li data-theme="b" data-filtertext="Login Here">				
				<a href="./logout.php" data-ajax="false">Logout</a>
			</li>
			<?php } ?>
			<li data-theme="b" data-filtertext="List of post">
				<a href="./list.php" data-ajax="false">List SubSaiddits</a>
			</li>
		</ul>
	</div>