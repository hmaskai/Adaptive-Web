<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/prequestionnaire.css">
</head>

<body>

<?php
	include_once("../includes/session.php");
	include_once("../includes/config.php");
	include_once("../includes/database.php");

?>
<!-- nilams code -->
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
<!-- nilams code ends here -->


<div class="container">

  <h2>Questionnaire - Part 1</h2>
  <p>Answer the questions to the best of your knowledge below</p>
  
  
  <?php 
    
	if (!isset($session->user_id)) {
    header('Location: login.php');
    exit();
	}
	$q="select * from login where user_id =".$session->user_id;
	$pretest = $database->fetch_array($database->query($q));
	
	if($pretest["pretest"]){
		
		header('Location: homepage.php');
		
	}
	
	?>
  
  <!--Pre Questionnaire Form -->
  
  <form role="form" action="prequestionnaire_validate.php" method="post" >
    <div class="form-group">
      <label for="studentID">Please enter your Student ID</label>
      <input type="text" class="form-control" id="usr" name="usr">
    </div>
	
	<div class="form-group">
		<label for="programmingSkill">How confident are you in your programming skills?</label>
		<div class="radio">
		  <label><input type="radio" name="programmingSkill" value="Very Confident">Very confident</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="programmingSkill" value="Moderately confident">Moderately confident</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="programmingSkill" value="Somewhat confident">Somewhat confident</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="programmingSkill" value="Not at all confident">Not at all confident</label>
		</div>
	</div>
	
	
	
	<div class="form-group">
		<label for="coursesCompleted">How many college-level Computer Science courses have you completed, before this one?</label>
		<div class="radio">
		  <label><input type="radio" name="coursesCompleted" value="1">1</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="coursesCompleted" value="2">2</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="coursesCompleted" value="3">3</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="coursesCompleted" value="4">More than 4</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="characteristic">Which of the following descriptions characterize you well?</label>
		<div class="radio">
		  <label><input type="radio" name="characteristic" value="Degree in CS">I have a degree in computer science (or a closely related field) or significant work experience</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="characteristic" value="Some work experience in CS">I have completed some coursework in computer science (or a closely related field) or have some work experience in this field</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="characteristic" value="Background in business">I have a background in business, marketing, or sales</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="characteristic" value="Self learer">I like to explore this subject on my own</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="gender">What is your gender?</label>
		<div class="radio">
		  <label><input type="radio" name="gender" value="male">Male</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="gender" value="female">Female</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="gender" value="other">Other</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="age">What is your age?</label>
		<div class="radio">
		  <label><input type="radio" name="age" value="under 18">Under 18</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="18-25">18-25</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="26-30">26-30</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="31-35">31-35</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="36-40">36-40</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="41-45">41-45</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="46-50">46-50</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="51-55">51-55</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="56-60">56-60</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="age" value="Over 60">Over 60</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="motherTongue">Is your mother tongue/first language English, or another language?</label>
		<div class="radio">
		  <label><input type="radio" name="motherTongue" value="English">English</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="motherTongue" value="Another">Another Language</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="motherTongue" value="Both">Both English and another language</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="country">Is your country of primary residence USA, or another country?</label>
		<div class="radio">
		  <label><input type="radio" name="country" value="USA">USA</label>
		</div>
		<div class="radio">
		  <label><input type="radio" name="country" value="Another">Another Country</label>
		</div>
	</div>
	
	<label for="counrtyResidence">If another, please specify your country of residence</label>
	<div class="form-group">
	  <input type="text" class="form-control" id="countryResidence" name="countryResidence">
	</div>
    <input type="submit" class="btn btn-success" value="Next"/>
  </form>
  
   <!--Pre Questionnaire Form Ends Here-->
</div>

</body>
</html>