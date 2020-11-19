<?php
	$localhostname='localhost';
	$accoutname='root';
	$pass='';
	$database='nhung';
	$conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
	if (!$conn) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
	}

?>