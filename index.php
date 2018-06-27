<?php session_start();?>
<div class="container-fluid">
	<?php include('partials/header.php');?>
	<?php include('partials/search_function.php');?>
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<header class="text-success text-center">
				<?php if(isset($_SESSION['success'])):?>
				<strong id="success">
				<?php
					echo $_SESSION['success'];
					session_destroy();
				?>
				</strong>
				<?php endif; ?>
				</header>
				<div class="card-body">
			    <?php 
			    	include('config/conf.php');
			    	$limit = 50;
			    	$query = "SELECT  questions.*,users.name AS users_name FROM questions LEFT JOIN users ON users.id = questions.user_id";
			    	$results = mysqli_query($conn,$query);
			    	# Search Result
			    	if(isset($_GET['q'])) {
			    		$results = search_perform($_GET['q'], "questions", "questions.title", "users");
			    	}
			    	// print_r($results);
			    	while($rows = mysqli_fetch_assoc($results)):
			    	$question = $rows['body'];			    		
			    ?>
				<b class="card-title"><a href=""><?=$rows['title']?></a></b>
				<span class="pull-right"><?= $rows['users_name'];?></span>
			    <p class="card-text">
			    	<?php 
			    	if (strlen($question) > $limit):
			    	      $question = substr($question, 0, strrpos(substr($question, 0, $limit), ' ')) . '...';
			    	?>
			    	<?= $question ?>
			    	<a href="question_detail.php?q=<?= $rows['id']?>">
			    		Read More
			    	</a>
			    	<?php endif;?>
			    </p><hr>
					<?php endwhile;?>
			  </div>
			</div>
		</div>
		<?php 
		include("config/conf.php");

		$qry = "SELECT name FROM categories";
		$output = mysqli_query($conn,$qry);
		?>
		<div class="col-md-3">
			<div class="card">
			  <!-- <img class="card-img-top" src="assets/images/profile.jpeg" alt="Card image cap"> -->
			  <?php  while($category = mysqli_fetch_assoc($output)): ?> 
			  	  <li class="list-group-item"><?= $category["name"] ?></li>
       <?php endwhile;?>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<form class="form-horizontal" action="question.php" method="post">
						<div class="form-group">
							<label class="label-control">
								Question Title
							</label>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label class="label-control">Question</label>
							<textarea name="body" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label class="label-control">Upload image(optional)</label>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-lg pull-right" type="submit">Submit Question</button>
							<button class="btn btn-danger btn-lg" type="reset">Cancel</button>
						</div>
						<input type="hidden" name="user_id" value="1">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			$("#success").fadeOut('slow');
		},1000);
		$("#search").on('keydown',function(e){
		    var key   = e.keyCode ? e.keyCode : e.which;
		    if(key == 13) {
		    	$("#submit").click();
		    }
		  });
	});
</script>