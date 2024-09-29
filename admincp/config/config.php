<?php
	
	$mysqli = new mysqli("localhost", "root", "", "assignment");

	// Check connection
	if ($mysqli->connect_errno) {
		echo "Kết nối MYSQLi Lỗi" . $mysqli->connect_errno;
		exit();
	}
?>