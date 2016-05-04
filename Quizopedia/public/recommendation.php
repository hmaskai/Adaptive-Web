<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/homepage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php 
	//session_start();
	include_once("../includes/session.php");
	include_once("../includes/config.php");
	include_once("../includes/database.php");
	include_once("../includes/functions.php");

	if (!isset($session->user_id)) {
    header('Location: login.php');
    exit();
}

	$q="select * from login where user_id =".$session->user_id;
	$pretest = $database->fetch_array($database->query($q));
	
	if(!$pretest["pretest"]){
		
		header('Location: pre_questionnaire.php');
		
	}
	?>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		</button>
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Quizopedia</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="myNavbar">
		  
		  <ul class="nav navbar-nav navbar-right">
			  <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]?></a></li>
			  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
	
	<?php 
					$q = "select * from questions where question_id =".$_POST['question_id'];
					$result = $database->query($q);

					
					$question = $database->fetch_array($result);
					//$GLOBALS['q'] = $question;

					$q_validate = "select * from student_questions where user_id = '".$session->user_id."' and question_id = '".$question["question_id"]."' and answer<>-1";
					$res = $database->query($q_validate);
					//echo $result_validate["answer"];
					$result_validate = mysql_fetch_array($res);
					$num_rows = $database->num_rows($res);
					//echo $num_rows;
				
					
					//if($num_rows != 0){
					
					
					echo "<h2 class='answered_question'>Quiz #".$question["question_id"]."<br/>".$question["question_text"]."</h2>";
					?>
						
					
						<div style="margin-left:33%">
							
							<div class="radionew">
							<a href="#">	
	                         <span class="<?php echo $question['correct_answer'] == 1 ? "glyphicon glyphicon-ok" : "glyphicon glyphicon-remove"?>" style="color:<?php echo $functions->mark_option($question['correct_answer'], $result_validate['answer'], 1)?>"></span>
							 </a>
							<label for="radio1" ><?php echo $question["option_1"];?></label>
							</div>

							<div class="radionew">
							<a href="#">	
	                         <span class="<?php echo $question['correct_answer'] == 2 ? "glyphicon glyphicon-ok" : "glyphicon glyphicon-remove"?>" style="color:<?php echo $functions->mark_option($question['correct_answer'], $result_validate['answer'], 2)?>"></span>
							 </a>
							<label for="radio2"><?php echo $question["option_2"];?></label>
							</div>

							<div class="radionew">	
							<a href="#">	
	                         <span class="<?php echo $question['correct_answer'] == 3 ? "glyphicon glyphicon-ok" : "glyphicon glyphicon-remove"?>" style="color:<?php echo $functions->mark_option($question['correct_answer'], $result_validate['answer'], 3)?>"></span>
							 </a>
							<label for="radio3"><?php echo $question["option_3"];?></label>
							</div>

							<div class="radionew">	
							<a href="#">	
	                         <span class="<?php echo $question['correct_answer'] == 4 ? "glyphicon glyphicon-ok" : "glyphicon glyphicon-remove"?>" style="color:<?php echo $functions->mark_option($question['correct_answer'], $result_validate['answer'], 4)?>"></span>
							 </a>
							<label for="radio4"><?php echo $question["option_4"];?></label>
							</div>
							
						</div>
						
					<!--?php }?-->
					<div style="clear:left;margin-top:15%;text-align:center;">
	<h3 style="clear:left;">Recommendations for this question:</h3>
	
	
 <?php 
 $q = "select tags from questions where question_id=".$_POST['question_id'];
 $tags = $database->fetch_array($database->query($q));
 
 //print_r($tags['tags']);
 
 
 $output = shell_exec("java -jar LuceneFinal.jar 1 ".$tags['tags']);
 $links = explode(",",$output);
  //echo sizeof($links);
  //$links = array explode ( ">" , string $output[, int $limit = PHP_INT_MAX ]);
 $i=0;
 while($i < sizeof($links)){
	 
	 echo ($i+1).". <a href=".$links[$i].">".$links[$i]."</a><br/>";
	 $i++;
 }
 
 
 ?>
	
	<h3>What your peers have to say:</h3>
	</div>
	</div>
</body>