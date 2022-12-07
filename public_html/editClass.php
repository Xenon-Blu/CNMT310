<?php
session_start();
if ($_SESSION["role"]!= "admin"){
	$_SESSION['error'][] =  "Access denied, this requires elevation.";
	die(header("Location: ./auth/form.php"));
}
//This file needs 'Template.php'
require_once("./template/template.php");
//Also requires the ClassArray
require_once("./ClassArray.php");
$page = new Template("Admin page");
$create = new ClassArray();
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
//Skeleton for Edit Class Form
print "<h1>Edit Class</h1>";
print "<h2>Class ID</h2><input type = number name = 'classId'><br>";
print "<h2>Class Name</h2><input type = text name = 'className'><br>";
print "<h2>Department Code</h2><input type = number name = 'classCode'><br>";
print "<h2>Class Num</h2><input type = number name = 'classNum'><br>";
print "<h2>Instructor</h2><input type = text name = 'instructor'><br>";
print "<h2>Meeting Time</h2><input type = text name = 'meetingTime'><br>";
print "<input type = 'submit' name = 'editClass' value='Edit It'>";
print $page->getBottomSection();
?>