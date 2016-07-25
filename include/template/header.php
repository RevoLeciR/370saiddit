<?php include_once "./include/dbconnect.php"; 
if(isset($_COOKIE["aid"])){
	$current = time();
	$aid = $_COOKIE['aid'];
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> @"@ I'm Title @"@ </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./include/css/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="./include/css/style.css">
  <link rel="stylesheet" href="./include/css/jquery.timepicker.css">

  <script src="./include/js/jquery-1.11.1.min.js"></script>
  <script src="./include/js/jquery.mobile-1.4.5.min.js"></script>
  <script src="./include/js/jquery.timepicker.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&language=en"></script>
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
        <dt id="header_title"> @"@ <span>prototype</span></dt>
		<a href="#left-panel" data-icon="carat-r" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-nodisc-icon">Open left panel</a>
    </div><!-- /header -->

	<div data-role="panel"  data-display="push"  id="left-panel" data-theme="b">
		<a href="#" data-rel="close" class="ui-btn ui-corner-all ui-shadow ui-mini ui-btn-inline ui-icon-delete ui-btn-icon-left ui-btn-right">Close</a>
		<br><br>
		<ul data-role="listview" data-theme="b" style="margin-top:0px;" class="nav-search">
			<li data-theme="b" data-filtertext="back to home">
				<a href="./index.php" data-ajax="false">Home</a>
			</li>
			<?php if(!$aid){?>
			<li data-theme="b" data-filtertext="Login Here">				
				<a href="./login.html" data-ajax="false">Login</a>
			</li>
			<?php }else{?>
			<li data-theme="b" data-filtertext="Login Here">				
				<a href="./logout.php" data-ajax="false">Logout</a>
			</li>
			<?php } ?>
			<li data-theme="b" data-filtertext="List of post">
				<a href="./list.php" data-ajax="false">List</a>
			</li>
		</ul>
	</div>