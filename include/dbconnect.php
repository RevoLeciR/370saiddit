<?php

	$dbsite = 'localhost';
	$dbuser = 'root';
	$dbpw = '50366123';
	$dbase = '370';

	$db = mysqli_connect($dbsite,$dbuser,$dbpw,$dbase);
	if(!$db){
		die('Database Connection lost: ' .mysqli_error($db));
	}

?>