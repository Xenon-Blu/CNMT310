<?php
session_start();
if($_SESSION['confirmed'] != true){ //if the confirmed variable does not equal true (i.e., the user skipped step 2)
	header("Location: ./class-step1.php", TRUE, 301);//return the user to page 1
	die();	
}
if (!isset($_SESSION["chosenClass"])||empty($_SESSION['chosenClass'])){//if the chosen class variable is not set
	$_SESSION['error'][] = "Please choose a class.";				   //throw an error
	header("Location: ./class-step1.php", TRUE, 301);				   //and prevent the user from proceeding until they select a valid class
	die();	
}
$classChosen=$_SESSION["chosenClass"];//create a local array $classChosen equal to the session variable "chosenClass" from step 2, for easier print statements
print "<!doctype html>\n";
print "<html lang=\"en\">";
print "<head>\n";
print "<meta charset=\"utf-8\">";
print "<title>Class Picker - Step 3 of 3</title>\n";
print "</head>\n";
print "<body>\n";
print ("You are now enrolled in  ".$classChosen["classCode"]." ".$classChosen["classNum"].": ".$classChosen["className"]." on ".$classChosen["meetingTime"].".");
print "<br/>";
print "<a href=\"./class-step1.php\">Click here to start over.</a>";
print "</body></html>\n";
?>