<?php
	$conn = new mysqli('localhost', 'root', '', 'tmt');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>