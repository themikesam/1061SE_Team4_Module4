<?php
	$host = 'localhost';
	$user = 'testuser';
	$pass = 'testpass';
	$db = 'ecological';
	$con = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); 
	mysqli_query($con,"SET NAMES utf8");
?>