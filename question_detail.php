<?php 
	include('config/conf.php');
	$id = $_GET['q'];
	$question_query = "SELECT *,users.name AS user_name FROM questions LEFT JOIN users ON questions.user_id = users.id WHERE questions.id = $id";
	$ques = mysqli_query($conn,$question_query);
	$questions = mysqli_fetch_assoc($ques);
	$answers_query = "SELECT answers.id,answers.body,answers.created_at,users.name AS ans_user FROM answers  LEFT JOIN users ON users.id = answers.user_id WHERE answers.question_id = $id";
	$ans = mysqli_query($conn,$answers_query);
	$an = mysqli_num_rows($ans);
?>
<div class="container-fluid">
<?php include('partials/header.php');?>
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<b class="card-title">
						<?= $questions['title'];?>
					</b>
					<b class="pull-right">
					By
						<?= $questions['user_name'];?>
					</b>
					<p class="card-text">
						<?= $questions['body']?>
						<i class="pull-right">
							<?= date('d-m-Y',strtotime($questions['created_at']));?>
						</i>					
					</p>
					<hr>
					<strong class="text-success">
						( <?php echo $an?> ) Answers
					</strong>
					<ul class="list-group list-group-flush">
						<?php while($answers = mysqli_fetch_assoc($ans)):?>
						<li class="list-group-item">
							<?= $answers['body'];?>
							<span class="pull-right">
							At
								<i class="">
								<?= date('d-m-Y',strtotime($answers['created_at']));?>
							</i> By
							<strong class="">
								<?= $answers['ans_user'];?>
							</strong>
							</span>
							<!-- reply -->
							<ul class="list-group">
								<?php 
								$ans_id = $answers['id'];
								echo $ans_id;
								$comments_query = "SELECT comments.id,comments.body,comments.created_at,users.name AS cmt_user FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE comments.answer_id = $ans_id";
								$cmt = mysqli_query($conn,$comments_query);
								while($comments = mysqli_fetch_assoc($cmt)):?>
									<li class="list-group-item">
										<?= $comments['body'];?>
										<span class="pull-right">
										At
											<i class="">
											<?= date('d-m-Y',strtotime($answers['created_at']));?>
										</i> By
										<strong class="">
											<?= $answers['ans_user'];?>
										</strong>
										</span>
									</li>
								<?php endwhile;?>
								<li class="list-group-item">
								<form class="form-horizontal" action="comment.php" method="post">
								    <a data-id="" class="red" data-toggle="modal" data-target="#exampleModal">
								      Reply
								  </a>
								</form>
									<!-- <a href="" data-toggle="modal" data-target="#exampleModal">Reply</a> -->
								</li>
							</ul>
						</li>
						<?php endwhile;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
				<h5 class="text-success">Write Your Answer Here!</h5>
					<form class="form-horizontal" action="answer.php" method="POST">
						<div class="form-group">
							<textarea class="form-control" name="body"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-lg pull-right" type="submit">Submit Answer</button>
							<button class="btn btn-danger btn-lg" type="reset">Cancel</button>
						</div>
						<input type="hidden" name="question_id" value="<?php echo $id?>" class="form-control"></input>
						<input type="hidden" name="user_id" value="2" class="form-control"></input>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('partials/modal.php');
?>