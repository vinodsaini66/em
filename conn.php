<?php
	$conn = new mysqli('localhost', 'root', '8233639160@Aa', 'employee_managment');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	
?>
