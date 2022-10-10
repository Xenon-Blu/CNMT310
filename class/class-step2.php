<?php
session_start();
if (!isset($_POST["class"])||empty($_POST["class"])){//if the user attempts to proceed without selecting a class,
	$_SESSION['error'][] = "Please choose a class."; //throw an error
	header("Location: ./class-step1.php", TRUE, 301);//and prevent the user from proceeding until they select a valid class.
	die();
}
$classChosen=array();//create an array for the chosen class
foreach($_SESSION["classInfo"]as $cInfo){ 			 //for each item in the classInfo array,
	if($cInfo["classId"]==$_POST["class"]){ 		 //if the item's class ID matches the class ID submited via POST,
		$classChosen = $cInfo; 						 //copy that item to the classChosen variable.
	}
}
if(!isset($classChosen)||empty($classChosen)){	     //if the foreach loop was unable to find the class (i.e., a user submitted an invalid class ID)
	$_SESSION['error'][] = "Invalid Class ID.";		 //throw an error
	header("Location: ./class-step1.php", TRUE, 301);//and prevent the user from proceeding until they select a valid class
	die();
}
$_SESSION["chosenClass"]=$classChosen;//Set the session's "chosenClass" variable to match the local array $classChosen, so that step 3 can access it
$_SESSION['confirmed'] = true;//set confirmed variable to true, so that step 3 knows step 2 was visited.
print "<!doctype html>\n";
print "<html lang=\"en\">";
print "<head>\n";
print "<meta charset=\"utf-8\">";
print "<title>Class Picker - Step 2 of 3</title>\n";
print "</head>\n";
print "<body>\n";
print ("You have chosen ".$classChosen['classCode']." ".$classChosen['classNum'].": ".$classChosen['className']." on ".$classChosen['meetingTime'].".");
print "<br/>";
print "<a href=\"./class-step3.php\">Confirm your choice and enroll.</a>";
print "<br/>";
print "<a href=\"./class-step1.php\">Go back and select again.</a>";
print "</body></html>\n";
?>