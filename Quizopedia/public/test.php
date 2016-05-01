<?php 
include_once("../includes/functions.php");
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

echo "Accuracy: ";
echo $functions -> student_accuracy()."</br></br>";

echo "Correct Incorrect: ";
echo $functions->csv_correct_incorrect_unattempted()."</br></br>";
?>