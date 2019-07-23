<?
	include('config/conf.php');
	$question = $_POST['question_id'];
	$answer = $_POST['answer_id'];
	$user_id = $_POST['user_id'];
	$body = $_POST['body'];
echo $body;
	// $query = "INSERT INTO comments(question_id,answer_id,body,user_id) VALUES('$question','$answer','$body','$user_id')";
	// $ok = mysqli_query($conn,$query);
	// if($ok) {
	// 	header("location:question_detail.php?q=$question");
	// }
