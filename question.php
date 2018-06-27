<?php 
session_start();
include("config/conf.php");
$title = $_POST['title'];
$body = $_POST['body'];
$user_id = $_POST['user_id'];
$qry = "INSERT INTO questions(title,body,user_id) VALUES('$title','$body','$user_id')";
$result = mysqli_query($conn,$qry);
if($result){
	$_SESSION['success'] = "your question was uploaded";
	header("location:index.php");
}

?>