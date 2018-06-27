<?php
	include('config/conf.php');
	$question_id = $_POST['question_id'];
	$user_id = $_POST['user_id'];
	$body = $_POST['body'];
	$query = "INSERT INTO answers(question_id,user_id,body) VALUES('$question_id','$user_id','$body')";
	$submit = mysqli_query($conn,$query);
	if($submit) {
		header("location:question_detail.php?q=$question_id");
	} 