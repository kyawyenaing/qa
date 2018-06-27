<?php
	$host = "mysql://mysql:3306/";
	$username = "root";
	$password = "gYeLi0Ktn5HbnMkP";
	$db = "sampledb";
	$conn = mysqli_connect($host,$username,$password);
	mysqli_select_db($conn,$db);