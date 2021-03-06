<?php

function calc_freq($str){
	$Class = "Class";
	$Object = "Object";
	$Variables = "Variables";
	$Wrapper_Classes = "Wrapper";
	$String = "String";
	$Constants = "Constants";
	$Primitive_Data_Type = "Primitive Data Type";
	$Boolean_Expressions = "Boolean Expressions";
	$Arithmetic_Expressions = "Arithmetic Expressions";
	$Two_Dimensional_Array = "Two Dimensional Array";
	$ArrayList = "ArrayList";
	$Arrays = "Arrays";
	$Exceptions = "Exceptions";
	$Nested_Loops = "Nested Loops";
	$For_Loop = "For Loop";
	$Do_While_Loop = "Do-While Loop";
	$Switch_Statement = "Switch Statement";
	$Decision_Types = "Decision Types";
	$Interface = "Interface";
	$Inheritance = "Inheritance";
	$frequency = array(
		$Class => substr_count(strtolower($str),strtolower($Class)),
		$Object => substr_count(strtolower($str),strtolower($Object)),
		$Variables => substr_count(strtolower($str),strtolower($Variables)),
		$Wrapper_Classes => substr_count(strtolower($str),strtolower($Wrapper_Classes)),
		$String => substr_count(strtolower($str),strtolower($String)),
		$Constants => substr_count(strtolower($str),strtolower($Constants)),
		$Primitive_Data_Type => substr_count(strtolower($str),strtolower($Primitive_Data_Type)),
		$Boolean_Expressions => substr_count(strtolower($str),strtolower($Boolean_Expressions)),
		$Arithmetic_Expressions => substr_count(strtolower($str),strtolower($Arithmetic_Expressions)),
		$Two_Dimensional_Array => substr_count(strtolower($str),strtolower($Two_Dimensional_Array)),
		$ArrayList => substr_count(strtolower($str),strtolower($ArrayList)),
		$Arrays => substr_count(strtolower($str),strtolower($Arrays)),
		$Exceptions => substr_count(strtolower($str),strtolower($Exceptions)),
		$Nested_Loops => substr_count(strtolower($str),strtolower($Nested_Loops)),
		$For_Loop => substr_count(strtolower($str),strtolower($For_Loop)),
		$Do_While_Loop => substr_count(strtolower($str),strtolower($Do_While_Loop)),
		$Switch_Statement => substr_count(strtolower($str),strtolower($Switch_Statement)),
		$Decision_Types => substr_count(strtolower($str),strtolower($Decision_Types)),
		$Interface => substr_count(strtolower($str),strtolower($Interface)),
		$Inheritance => substr_count(strtolower($str),strtolower($Inheritance)),
	);
	return $frequency;
}

function weekly_accuracy($question_ids){
	$total = 0;
	$correct = 0;
	
	while($row = mysql_fetch_array($question_ids)){
		$q = "select answer from student_questions where user_id = ".$_SESSION['user_id']." and question_id = ".$row['question_id']." LIMIT 1";
		$result = mysql_query($q);
		$result = mysql_fetch_array($result);
		//echo $row['question_id']." ".$row['correct_answer']." ".$result['answer']."</br>";
		if($result['answer'] == $row['correct_answer']){
			$total++;
			$correct++;
		}
		else{
			$total++;
		}
	}
	
	if($total != 0)
		return round($correct * 100 / $total, 2);
	else
		return 0;
}

class MyFunction {
	//public $json_d;
	public function mark_option($correct_answer, $student_answer, $option){
		if($option == $correct_answer)
			return "green";
		if($option == $student_answer)
			return "red";
		else
			return "white";
	}
		
	public function json_convert($uid) {
		//----- QUERY FOR TAGS OF ALL QUESTIONS [TO FIND THE COUNT OF ALL QUESTIONS]--------
		$q = "select lower(tags) as tags from questions where type = 'Q'";
		
		//----- QUERY FOR TAGS OF ALL CORRECT ANSWERS OF LOGGED IN STUDENT------------------
		$q_c = "select lower(q.tags) as tags from questions q, student_questions sq where sq.user_id = ".$uid." and q.question_id = sq.question_id and sq.answer = q.correct_answer and q.type = 'Q'";
		
		//----- QUERY FOR TAGS OF ALL IN-CORRECT ANSWERS OF LOGGED IN STUDENT---------------
		//$q = "select lower(q.tags) as tags from questions q, student_questions sq where sq.user_id = $session->user_id and q.question_id = sq.question_id and sq.answer != q.correct_answer and q.type = 'Q'"
		
		//$result = $database->query($q);
		//-----------------------------------------------------------
		$result = mysql_query($q);
		//$r = mysql_fetch_array($result);
		$str_c = "";
		while($row = mysql_fetch_array($result)){
			$str_c = $str_c.",".$row["tags"];
		}
		$str_c = str_replace(", ", ",", $str_c);
		$str_c = substr($str_c, 1, -1);
		$str_c = str_replace(",", ", ", $str_c);
		//-----------------------------------------------------------
		$result_c = mysql_query($q_c);
		//$r_c = mysql_fetch_array($result_c);
		$str_c_c = "";
		while($row_c = mysql_fetch_array($result_c)){
			$str_c_c = $str_c_c.",".$row_c["tags"];
		}
		$str_c_c = str_replace(", ", ",", $str_c_c);
		$str_c_c = substr($str_c_c, 1, -1);
		$str_c_c = str_replace(",", ", ", $str_c_c);
		//-----------------------------------------------------------
		
		
		//echo $str_c;
		// formatting string complete
		// code to find the occurance of each concept in the string
		$Class = "Class";
		$Object = "Object";
		$Variables = "Variables";
		$Wrapper_Classes = "Wrapper";
		$String = "String";
		$Constants = "Constants";
		$Primitive_Data_Type = "Primitive Data Type";
		$Boolean_Expressions = "Boolean Expressions";
		$Arithmetic_Expressions = "Arithmetic Expressions";
		$Two_Dimensional_Array = "Two Dimensional Array";
		$ArrayList = "ArrayList";
		$Arrays = "Arrays";
		$Exceptions = "Exceptions";
		$Nested_Loops = "Nested Loops";
		$For_Loop = "For Loop";
		$Do_While_Loop = "Do-While Loop";
		$Switch_Statement = "Switch Statement";
		$Decision_Types = "Decision Types";
		$Interface = "Interface";
		$Inheritance = "Inheritance";
		
		$Class_count=substr_count(strtolower($str_c),strtolower($Class));
		$Object_count=substr_count(strtolower($str_c),strtolower($Object));
		$Variables_count=substr_count(strtolower($str_c),strtolower($Variables));
		$Basic_Concepts = $Class_count + $Object_count + $Variables_count;
		
		$Wrapper_Classes_count=substr_count(strtolower($str_c),strtolower($Wrapper_Classes));
		$String_count=substr_count(strtolower($str_c),strtolower($String));
		$Constants_count=substr_count(strtolower($str_c),strtolower($Constants));
		$Primitive_Data_Type_count=substr_count(strtolower($str_c),strtolower($Primitive_Data_Type));
		$Data_Types = $Wrapper_Classes_count + $String_count + $Constants_count + $Primitive_Data_Type_count;
		
		$Boolean_Expressions_count=substr_count(strtolower($str_c),strtolower($Boolean_Expressions));
		$Arithmetic_Expressions_count=substr_count(strtolower($str_c),strtolower($Arithmetic_Expressions));
		$Operations = $Boolean_Expressions_count + $Arithmetic_Expressions_count;
		
		$Two_Dimensional_Array_count=substr_count(strtolower($str_c),strtolower($Two_Dimensional_Array));
		$ArrayList_count=substr_count(strtolower($str_c),strtolower($ArrayList));
		$Arrays_count=substr_count(strtolower($str_c),strtolower($Arrays));
		$Arrays_concept = $Two_Dimensional_Array_count + $ArrayList_count +$Arrays_count;
		
		$Exceptions_count=substr_count(strtolower($str_c),strtolower($Exceptions));
		$Nested_Loops_count=substr_count(strtolower($str_c),strtolower($Nested_Loops));
		$For_Loop_count=substr_count(strtolower($str_c),strtolower($For_Loop));
		$Do_While_Loop_count=substr_count(strtolower($str_c),strtolower($Do_While_Loop));
		$Switch_Statement_count=substr_count(strtolower($str_c),strtolower($Switch_Statement));
		$Decision_Types_count=substr_count(strtolower($str_c),strtolower($Decision_Types));
		$Control_Structures = $Exceptions_count + $Nested_Loops_count + $For_Loop_count + $Do_While_Loop_count + $Switch_Statement_count + $Decision_Types_count;
		
		$Interface_count=substr_count(strtolower($str_c),strtolower($Interface));
		$Inheritance_count=substr_count(strtolower($str_c),strtolower($Inheritance));
		$Interface_Inheritance = $Interface_count + $Inheritance_count;
		$total = $Basic_Concepts + $Data_Types + $Operations + $Arrays_concept + $Control_Structures + $Interface_Inheritance;
		
		
		$Class_count_c=substr_count(strtolower($str_c_c),strtolower($Class));
		$Object_count_c=substr_count(strtolower($str_c_c),strtolower($Object));
		$Variables_count_c=substr_count(strtolower($str_c_c),strtolower($Variables));
		$Basic_Concepts_c = $Class_count_c + $Object_count_c + $Variables_count_c;
		
		$Wrapper_Classes_count_c=substr_count(strtolower($str_c_c),strtolower($Wrapper_Classes));
		$String_count_c=substr_count(strtolower($str_c_c),strtolower($String));
		$Constants_count_c=substr_count(strtolower($str_c_c),strtolower($Constants));
		$Primitive_Data_Type_count_c=substr_count(strtolower($str_c_c),strtolower($Primitive_Data_Type));
		$Data_Types_c = $Wrapper_Classes_count_c + $String_count_c + $Constants_count_c + $Primitive_Data_Type_count_c;
		
		$Boolean_Expressions_count_c=substr_count(strtolower($str_c_c),strtolower($Boolean_Expressions));
		$Arithmetic_Expressions_count_c=substr_count(strtolower($str_c_c),strtolower($Arithmetic_Expressions));
		$Operations_c = $Boolean_Expressions_count_c + $Arithmetic_Expressions_count_c;
		
		$Exceptions_count_c=substr_count(strtolower($str_c_c),strtolower($Exceptions));
		$Nested_Loops_count_c=substr_count(strtolower($str_c_c),strtolower($Nested_Loops));
		$For_Loop_count_c=substr_count(strtolower($str_c_c),strtolower($For_Loop));
		$Do_While_Loop_count_c=substr_count(strtolower($str_c_c),strtolower($Do_While_Loop));
		$Switch_Statement_count_c=substr_count(strtolower($str_c_c),strtolower($Switch_Statement));
		$Decision_Types_count_c=substr_count(strtolower($str_c_c),strtolower($Decision_Types));
		$Control_Structures_c = $Exceptions_count_c + $Nested_Loops_count_c + $For_Loop_count_c + $Do_While_Loop_count_c + $Switch_Statement_count_c + $Decision_Types_count_c;
		
		$Two_Dimensional_Array_count_c=substr_count(strtolower($str_c_c),strtolower($Two_Dimensional_Array));
		$ArrayList_count_c=substr_count(strtolower($str_c_c),strtolower($ArrayList));
		$Arrays_count_c=substr_count(strtolower($str_c_c),strtolower($Arrays));
		$Arrays_concept_c = $Two_Dimensional_Array_count_c + $ArrayList_count_c +$Arrays_count_c;
		
		$Interface_count_c=substr_count(strtolower($str_c_c),strtolower($Interface));
		$Inheritance_count_c=substr_count(strtolower($str_c),strtolower($Inheritance));
		$Interface_Inheritance_c = $Interface_count_c + $Inheritance_count_c;
		$total_c = $Basic_Concepts_c + $Data_Types_c + $Operations_c + $Arrays_concept_c + $Control_Structures_c + $Interface_Inheritance_c;
		
		$json_d = '{';
		$json_d = $json_d.'  "name": "Java Concepts",';
		$json_d = $json_d.'  "size": '.$total.',';
		$json_d = $json_d.'  "correct": '.$total_c.',';
		$json_d = $json_d.'  "incorrect": '.($total - $total_c).',';
		$json_d = $json_d.'  "children": [';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Basic Concepts",';
		$json_d = $json_d.'  	 "size": '.$Basic_Concepts.',';
		$json_d = $json_d.'  	 "correct": '.$Basic_Concepts_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Basic_Concepts - $Basic_Concepts_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Class_count.',';
		$json_d = $json_d.'          "name": "Class",';
		$json_d = $json_d.'  		 "correct": '.$Class_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Class_count - $Class_count_c).'';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "size": '.$Object_count.',';
		$json_d = $json_d.'          "name": "Object",';
		$json_d = $json_d.'  		 "correct": '.$Object_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Object_count - $Object_count_c).'';		
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Variables_count.',';
		$json_d = $json_d.'          "name": "Variable",';
		$json_d = $json_d.'  		 "correct": '.$Variables_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Variables_count - $Variables_count_c).'';
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'   {';
		$json_d = $json_d.'      "name": "Data Types",';
		$json_d = $json_d.'      "size": '.$Data_Types.',';
		$json_d = $json_d.'  	 "correct": '.$Data_Types_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Data_Types - $Data_Types_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Wrapper_Classes_count.',';
		$json_d = $json_d.'          "name": "Wrapper",';
		$json_d = $json_d.'  		 "correct": '.$Wrapper_Classes_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Wrapper_Classes_count - $Wrapper_Classes_count_c).'';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$String_count.',';
		$json_d = $json_d.'          "name": "String",';
		$json_d = $json_d.'  		 "correct": '.$String_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($String_count - $String_count_c).'';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Constants_count.',';
		$json_d = $json_d.'          "name": "Constants",';
		$json_d = $json_d.'  		 "correct": '.$Constants_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Constants_count - $Constants_count_c).'';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Primitive_Data_Type_count.',';
		$json_d = $json_d.'          "name": "Primitive Data Type",';
		$json_d = $json_d.'  		 "correct": '.$Primitive_Data_Type_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Primitive_Data_Type_count - $Primitive_Data_Type_count_c).'';
		$json_d = $json_d.'       }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Operations",';
		$json_d = $json_d.'  	 "size": '.$Operations.',';
		$json_d = $json_d.'  	 "correct": '.$Operations_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Operations - $Operations_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Boolean Expressions",';
		$json_d = $json_d.'  		 "correct": '.$Boolean_Expressions_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Boolean_Expressions_count - $Boolean_Expressions_count_c).',';
		$json_d = $json_d.'          "size": '.$Boolean_Expressions_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "name": "Arithmetic Expressions",';
		$json_d = $json_d.'  		 "correct": '.$Arithmetic_Expressions_count.',';
		$json_d = $json_d.'  		 "incorrect": '.($Arithmetic_Expressions_count - $Arithmetic_Expressions_count_c).',';
		$json_d = $json_d.'          "size": '.$Arithmetic_Expressions_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Control Structures",';
		$json_d = $json_d.'  	 "size": '.$Control_Structures.',';
		$json_d = $json_d.'  	 "correct": '.$Control_Structures_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Control_Structures - $Control_Structures_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Exceptions",';
		$json_d = $json_d.'  		 "correct": '.$Exceptions_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Exceptions_count - $Exceptions_count_c).',';
		$json_d = $json_d.'          "size": '.$Exceptions_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Nested Loops",';
		$json_d = $json_d.'  		 "correct": '.$Nested_Loops_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Nested_Loops_count - $Nested_Loops_count_c).',';
		$json_d = $json_d.'          "size": '.$Nested_Loops_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "For Loop",';
		$json_d = $json_d.'  		 "correct": '.$For_Loop_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($For_Loop_count - $For_Loop_count_c).',';
		$json_d = $json_d.'          "size": '.$For_Loop_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Do-While Loop",';
		$json_d = $json_d.'  		 "correct": '.$Do_While_Loop_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Do_While_Loop_count - $Do_While_Loop_count_c).',';
		$json_d = $json_d.'          "size": '.$Do_While_Loop_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Switch Statement",';
		$json_d = $json_d.'  		 "correct": '.$Switch_Statement_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Switch_Statement_count - $Switch_Statement_count_c).',';
		$json_d = $json_d.'          "size": '.$Switch_Statement_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Decision Types",';
		$json_d = $json_d.'  		 "correct": '.$Decision_Types_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Decision_Types_count - $Decision_Types_count_c).',';
		$json_d = $json_d.'          "size": '.$Decision_Types_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Array Concepts",';
		$json_d = $json_d.'  	 "size": '.$Arrays_concept.',';
		$json_d = $json_d.'  	 "correct": '.$Arrays_concept_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Arrays_concept - $Arrays_concept_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "name": "Two Dimensional Array",';
		$json_d = $json_d.'  		 "correct": '.$Two_Dimensional_Array_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Two_Dimensional_Array_count - $Two_Dimensional_Array_count_c).',';
		$json_d = $json_d.'          "size": '.$Two_Dimensional_Array_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "ArrayList",';
		$json_d = $json_d.'  		 "correct": '.$ArrayList_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($ArrayList_count - $ArrayList_count_c).',';
		$json_d = $json_d.'          "size": '.$ArrayList_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Arrays_count.',';
		$json_d = $json_d.'          "name": "Arrays",';
		$json_d = $json_d.'  		 "correct": '.$Arrays_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Arrays_count - $Arrays_count_c).'';
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Interface & Inheritance",';
		$json_d = $json_d.'  	 "size": '.$Interface_Inheritance.',';
		$json_d = $json_d.'  	 "correct": '.$Interface_Inheritance_c.',';
		$json_d = $json_d.'  	 "incorrect": '.($Interface_Inheritance - $Interface_Inheritance_c).',';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Interface",';
		$json_d = $json_d.'  		 "correct": '.$Interface_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Interface_count - $Interface_count_c).',';
		$json_d = $json_d.'          "size": '.$Interface_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Inheritance",';
		$json_d = $json_d.'  		 "correct": '.$Inheritance_count_c.',';
		$json_d = $json_d.'  		 "incorrect": '.($Inheritance_count - $Inheritance_count_c).',';
		$json_d = $json_d.'          "size": '.$Inheritance_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    }';
		$json_d = $json_d.'  ]';
		$json_d = $json_d.'}';
		
		return $json_d;
	}

	public function csv_correct_incorrect_unattempted(){
		
		//$result = mysql_query($q);
		//$r = mysql_fetch_array($result);

		$str = "'QuestionID,Correct,Incorrect,Unattempted\\n";
		
		$correct = "select q.question_id, count(s.question_id) correct from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer = q.correct_answer and s.answer != -1 GROUP BY q.question_id";
		
		$incorrect = "select q.question_id, count(s.question_id) incorrect from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer != q.correct_answer and s.answer != -1 GROUP BY q.question_id";
		
		$unattempted = "select q.question_id, count(s.question_id) unattempted from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer = -1 GROUP BY q.question_id";
		
		$correct_count = mysql_query($correct);
		$incorrect_count = mysql_query($incorrect);
		$unattempted_count = mysql_query($unattempted);
		
		//$cc = mysql_fetch_assoc($correct_count);
		//$ic = mysql_fetch_assoc($incorrect_count);
		//$uc = mysql_fetch_assoc($unattempted_count);
		
		//$my_arary = array();
		while($row_c = mysql_fetch_array($correct_count)){
			$row_in = mysql_fetch_array($incorrect_count);
			$row_un = mysql_fetch_array($unattempted_count);
			$str = $str."Quiz ".$row_c["question_id"].','.$row_c["correct"].','.$row_in["incorrect"].','.$row_un["unattempted"].'\n';
		}
		$str.="'";
		return $str;
	}
	
	public function student_accuracy(){
		$Class = "Class";
		$Object = "Object";
		$Variables = "Variables";
		$Wrapper_Classes = "Wrapper";
		$String = "String";
		$Constants = "Constants";
		$Primitive_Data_Type = "Primitive Data Type";
		$Boolean_Expressions = "Boolean Expressions";
		$Arithmetic_Expressions = "Arithmetic Expressions";
		$Two_Dimensional_Array = "Two Dimensional Array";
		$ArrayList = "ArrayList";
		$Arrays = "Arrays";
		$Exceptions = "Exceptions";
		$Nested_Loops = "Nested Loops";
		$For_Loop = "For Loop";
		$Do_While_Loop = "Do-While Loop";
		$Switch_Statement = "Switch Statement";
		$Decision_Types = "Decision Types";
		$Interface = "Interface";
		$Inheritance = "Inheritance";
		
		$result = mysql_query("select lower(tags) as tags from questions where type = 'Q'");
		$str = "";
		while($row = mysql_fetch_array($result)){
			$str = $str.",".$row["tags"];
		}
		$str = str_replace(", ", ",", $str);
		$str = str_replace(", ", ",", $str);
		$str = substr($str, 1);
		
		$total = calc_freq($str);
		
		$users = mysql_query("SELECT user_id, CONCAT( fname, ' ', lname ) as name from login order by user_id");
		$final = '[';
		
		while($u = mysql_fetch_array($users)){
			$user_correct = mysql_query("select lower(q.tags) tags from questions q, student_questions sq where sq.user_id = ".$u['user_id']." and q.question_id = sq.question_id and sq.answer = q.correct_answer and q.type = 'Q'");
			//echo "</br>";
			$str = "";
			while($row = mysql_fetch_array($user_correct)){
				$str = $str.",".$row["tags"];
			}
			$str = str_replace(", ", ",", $str);
			$str = str_replace(", ", ",", $str);
			$str = substr($str, 1);
			//echo "<b>".$u['name']."</b>: ".$str."</br>";
			//echo "</br>";
			
			$user_total = calc_freq($str);
			//print_r($user_total);
			//echo "</br>";
			//echo "</br>";
			
			
			// Start of building the string.
			$final .= "{Name:'".$u["name"]."',freq:{";
			$final = $final.$Class.":".round($total[$Class]!=0 ? (100 * $user_total[$Class])/$total[$Class] : 0, 2).", ";
			$final = $final.$Object.":".round($total[$Object]!=0 ? (100 * $user_total[$Object])/$total[$Object] : 0, 2).", ";
			$final = $final.$Variables.":".round($total[$Variables]!=0 ? (100 * $user_total[$Variables])/$total[$Variables] : 0, 2).", ";
			$final = $final.$Wrapper_Classes.":".round($total[$Wrapper_Classes]!=0 ? (100 * $user_total[$Wrapper_Classes])/$total[$Wrapper_Classes] : 0, 2).", ";
			$final = $final.$String.":".round($total[$String]!=0 ? (100 * $user_total[$String])/$total[$String] : 0, 2).", ";
			$final = $final.$Constants.":".round($total[$Constants]!=0 ? (100 * $user_total[$Constants])/$total[$Constants] : 0, 2).", ";
			$final = $final.$Primitive_Data_Type.":".round($total[$Primitive_Data_Type]!=0 ? (100 * $user_total[$Primitive_Data_Type])/$total[$Primitive_Data_Type] : 0, 2).", ";
			$final = $final.$Boolean_Expressions.":".round($total[$Boolean_Expressions]!=0 ? (100 * $user_total[$Boolean_Expressions])/$total[$Boolean_Expressions] : 0, 2).", ";
			$final = $final.$Arithmetic_Expressions.":".round($total[$Arithmetic_Expressions]!=0 ? (100 * $user_total[$Arithmetic_Expressions])/$total[$Arithmetic_Expressions] : 0, 2).", ";
			$final = $final.$Two_Dimensional_Array.":".round($total[$Two_Dimensional_Array]!=0 ? (100 * $user_total[$Two_Dimensional_Array])/$total[$Two_Dimensional_Array] : 0, 2).", ";
			$final = $final.$ArrayList.":".round($total[$ArrayList]!=0 ? (100 * $user_total[$ArrayList])/$total[$ArrayList] : 0, 2).", ";
			$final = $final.$Arrays.":".round($total[$Arrays]!=0 ? (100 * $user_total[$Arrays])/$total[$Arrays] : 0, 2).", ";
			$final = $final.$Exceptions.":".round($total[$Exceptions]!=0 ? (100 * $user_total[$Exceptions])/$total[$Exceptions] : 0, 2).", ";
			$final = $final.$Nested_Loops.":".round($total[$Nested_Loops]!=0 ? (100 * $user_total[$Nested_Loops])/$total[$Nested_Loops] : 0, 2).", ";
			$final = $final.$For_Loop.":".round($total[$For_Loop]!=0 ? (100 * $user_total[$For_Loop])/$total[$For_Loop] : 0, 2).", ";
			$final = $final.$Do_While_Loop.":".round($total[$Do_While_Loop]!=0 ? (100 * $user_total[$Do_While_Loop])/$total[$Do_While_Loop] : 0, 2).", ";
			$final = $final.$Switch_Statement.":".round($total[$Switch_Statement]!=0 ? (100 * $user_total[$Switch_Statement])/$total[$Switch_Statement] : 0, 2).", ";
			$final = $final.$Decision_Types.":".round($total[$Decision_Types]!=0 ? (100 * $user_total[$Decision_Types])/$total[$Decision_Types] : 0, 2).", ";
			$final = $final.$Interface.":".round($total[$Interface]!=0 ? (100 * $user_total[$Interface])/$total[$Interface] : 0, 2).", ";
			$final = $final.$Inheritance.":".round($total[$Inheritance]!=0 ? (100 * $user_total[$Inheritance])/$total[$Inheritance] : 0, 2)."}},";
			
		}
		
		$final = substr($final, 0, -1);
		$final .= ']';
		$final = str_replace("Wrapper Classes", "Wrapper_Classes", $final);
		$final = str_replace("Primitive Data Type", "Primitive_Data_Type", $final);
		$final = str_replace("Boolean Expressions", "Boolean_Expressions", $final);
		$final = str_replace("Arithmetic Expressions", "Arithmetic_Expressions", $final);
		$final = str_replace("Two Dimensional Array", "Two_Dimensional_Array", $final);
		$final = str_replace("Nested Loops", "Nested_Loops", $final);
		$final = str_replace("For Loop", "For_Loop", $final);
		$final = str_replace("Do-While Loop", "Do_While_Loop", $final);
		$final = str_replace("Switch Statement", "Switch_Statement", $final);
		$final = str_replace("Decision Types", "Decision_Types", $final);
		return $final;
	}
	
	public function recommend_topics($uid){
		
		$q = "SELECT lower(q.tags) tags FROM questions q, student_questions s where q.question_id = s.question_id and q.correct_answer != s.answer and s.user_id = ".$uid;
		$result = mysql_query($q);
		$str = "";

		while($row = mysql_fetch_array($result)){
			$str = $str.",".$row["tags"];
		}
		$str = str_replace(", ", ",", $str);
		$str = substr($str, 1);

		//$str = str_replace(",", ", ", $str);
		
		$Class = "Class";
		$Object = "Object";
		$Variables = "Variables";
		$Wrapper_Classes = "Wrapper";
		$String = "String";
		$Constants = "Constants";
		$Primitive_Data_Type = "Primitive Data Type";
		$Boolean_Expressions = "Boolean Expressions";
		$Arithmetic_Expressions = "Arithmetic Expressions";
		$Two_Dimensional_Array = "Two Dimensional Array";
		$ArrayList = "ArrayList";
		$Arrays = "Array";
		$Exceptions = "Exceptions";
		$Nested_Loops = "Nested Loops";
		$For_Loop = "For Loop";
		$Do_While_Loop = "Do-While Loop";
		$Switch_Statement = "Switch Statement";
		$Decision_Types = "Decision Types";
		$Interface = "Interface";
		$Inheritance = "Inheritance";

		$frequency = array(
			$Class => substr_count(strtolower($str),strtolower($Class)),
			$Object => substr_count(strtolower($str),strtolower($Object)),
			$Variables => substr_count(strtolower($str),strtolower($Variables)),
			$Wrapper_Classes => substr_count(strtolower($str),strtolower($Wrapper_Classes)),
			$String => substr_count(strtolower($str),strtolower($String)),
			$Constants => substr_count(strtolower($str),strtolower($Constants)),
			$Primitive_Data_Type => substr_count(strtolower($str),strtolower($Primitive_Data_Type)),
			$Boolean_Expressions => substr_count(strtolower($str),strtolower($Boolean_Expressions)),
			$Arithmetic_Expressions => substr_count(strtolower($str),strtolower($Arithmetic_Expressions)),
			$Two_Dimensional_Array => substr_count(strtolower($str),strtolower($Two_Dimensional_Array)),
			$ArrayList => substr_count(strtolower($str),strtolower($ArrayList)),
			$Arrays => substr_count(strtolower($str),strtolower($Arrays)),
			$Exceptions => substr_count(strtolower($str),strtolower($Exceptions)),
			$Nested_Loops => substr_count(strtolower($str),strtolower($Nested_Loops)),
			$For_Loop => substr_count(strtolower($str),strtolower($For_Loop)),
			$Do_While_Loop => substr_count(strtolower($str),strtolower($Do_While_Loop)),
			$Switch_Statement => substr_count(strtolower($str),strtolower($Switch_Statement)),
			$Decision_Types => substr_count(strtolower($str),strtolower($Decision_Types)),
			$Interface => substr_count(strtolower($str),strtolower($Interface)),
			$Inheritance => substr_count(strtolower($str),strtolower($Inheritance)),

		);
		
		arsort($frequency);
		//print_r($frequency);
		
		$output = "";
		$i = 0;
		foreach($frequency as $key => $value){
			$output .= $key.",";
			$i++;
			if($i == 5)
				break;
		}
		$output = substr($output, 0, -1);
		return $output;
	}
	
	public function generate_line(){
		//$q = mysql_query("select CONCAT( fname, ' ', lname ) as name from login where user_id = ".$_SESSION['user_id']);
		//$u = mysql_fetch_array($q);
		$pre_avg = "select * from questions where type = 'P'";
		$pre_avg = mysql_query($pre_avg);
		$avg = weekly_accuracy($pre_avg);
		
		$str = "'Date,Current,Past\\n";
		$max_week = "select max(WEEK(date)) maximum from questions";
		$max = mysql_query($max_week);
		$max = mysql_fetch_array($max);
		$max = $max['maximum'];
		$min_week = "select MIN(WEEK(date)) minimum from questions";
		$min = mysql_query($min_week);
		$min = mysql_fetch_array($min);
		$min = $min['minimum'];
		while($min != $max + 1){
			$q = "select * from questions where week(date) = ".$min;
			$query = mysql_query($q);
			
			$date = "SELECT STR_TO_DATE('2010".$min." Sunday', '%X%V %W') date";
			$date = mysql_fetch_array(mysql_query($date));
			//echo $date['date']."    ";
			
			$min++;
			$acc = weekly_accuracy($query);
			//echo "</br>";
			$str .= $date['date'].",".$acc.",".$avg."\\n";
		}
		$str = substr($str, 0, -2);
		return $str."'";
	}
}
	$functions = new MyFunction();
?>