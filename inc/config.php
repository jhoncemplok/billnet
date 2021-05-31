<?php
error_reporting(1);
$host 	= "localhost"; //Ganti dengan nama host anda
$user	= "root";		// Ganti dengan user phpmyadmin / database anda
$pass	= "";	// Ganti dengan password database anda
$db 	= "db";	// Ganti dengan nama database anda
mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());
?>
