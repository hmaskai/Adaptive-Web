
<?php
    include_once("../../includes/config.php");
	include_once("../../includes/database.php");
	require_once("../../../Mail.php");
	
    $question=$_POST['question'];
    $correctAns=$_POST['correctAns'];
	$op1=$_POST['op1'];
	$op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	
	
/*	
	echo $question;
	echo $op1;
	echo $op2;
	echo $op3;
	echo $op4;
	echo $correctAns;
	*/
	$tags="";
if(!empty($_POST['BasicConcept'])) {
	foreach($_POST['BasicConcept'] as $check1)
	$tags .=$check1." ,";
}
if(!empty($_POST['DataTypes'])) {
	foreach($_POST['DataTypes'] as $check2)
	$tags .=$check2." ,";
}	
if(!empty($_POST['Operation'])) {
	foreach($_POST['Operation'] as $check3)
	$tags .=$check3." ,";
}
if(!empty($_POST['Array'])) {
	foreach($_POST['Array'] as $check4)
	$tags .=$check4." ,";
}
if(!empty($_POST['ControlStructure'])) {
	foreach($_POST['ControlStructure'] as $check5)
	$tags .=$check5." ,";
}
if(!empty($_POST['InterfaceInheritance'])) {
	foreach($_POST['InterfaceInheritance'] as $check6)
	$tags .=$check6." ,";
}

//echo $tags;

	$sql = "INSERT INTO questions (question_text,option_1,option_2,option_3,option_4,correct_answer,tags,date,type)
			VALUES ('$question','$op1','$op2','$op3','$op4','$correctAns','$tags','".$_POST['quizDate']."','Q')";
//echo $sql;
	$database->query($sql);
	
	$q1 = "Select user_id from login";
	$users=$database->query($q1);
	
	$q2 = "select question_id from questions where type = 'Q' order by question_id desc LIMIT 1";
	$question =$database->fetch_array($database->query($q2));
	$i=0;
	while($row = mysql_fetch_array($users)){
		$sql = "Insert into student_questions (user_id,question_id,answer) Values ('$row[user_id]','$question[0]','-1')";
		$database->query($sql);
		$i++;
		}
	
	
	
	$q = "Select username from login";
	$students=$database->query($q);
	$str="";
	while($row = mysql_fetch_array($students)){
			//mail("'".$row['username']."'","A new quiz for you",$msg,$headers);
	$str.=$row['username'].",";
	
	}
	$str = substr($str, 0, -1);
	//$str.="'";
	echo $str;

/*for sending emails to the students*/
		$from = '<quizopedia.asu@gmail.com>';
		$to = $str;
		$subject = 'A new quiz of the day is here!!';
		$body = " A new challenge awaits you here: http://ec2-52-36-73-153.us-west-2.compute.amazonaws.com/Adaptive-Web/Quizopedia/public/login.php";

		$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject
		);

		$smtp = Mail::factory('smtp', array(
				'host' => 'ssl://smtp.gmail.com',
				'port' => '465',
				'auth' => true,
				'username' => 'quizopedia.asu@gmail.com',
				'password' => 'quizoftheday'
			));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
			echo('<p>' . $mail->getMessage() . '</p>');
		} else {
			echo('<p>Message successfully sent!</p>');
		}
	
	
	
	/*
	$q1 = "Select username from login";
	$students=$database->query($q1);
	$headers = "From: harshilmaskai91@gmail.com" . "\r\n" .
	//$students =$database->fetch_array($database->query($q2));
	//echo $students;
	$msg = "This is quizopedia test mail please do not panic";
	$msg = wordwrap($msg,70);
	while($row = mysql_fetch_array($students)){
			mail("'".$row['username']."'","A new quiz for you",$msg,$headers);
	
	}
	*/
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<title>Done</title>
</head>
<body>

<div class="container">
  <br>
  <br>
  <div class="alert alert-success">
    <strong>Success!</strong> The quiz is now ready and available to the students.
  </div>
  <a href="homepage_prof.php">Enter a new quiz</a>
</div>
</body>




