<?php
session_start();
$_SESSION['error'] = array();

if (!isset($_SESSION['chosenClass'])) {
  $_SESSION['error'][] = "Something has gone wrong, class not found";
  die(header("Location: class-step1.php"));
}  
// Template Create
require_once("template.php");
$page = new Template("class-step1.php");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// Print Top Section
print $page->getTopSection();
// -----------------
print "<h1>Class Confirmed</h1>";
print "<div>You are enrolled in ";
print $_SESSION['chosenClass']['classCode'] . " " . 
      $_SESSION['chosenClass']['classNum'] . ": " . $_SESSION['chosenClass']['className'] .
      " meeting on " . $_SESSION['chosenClass']['meetingTime'] . " with Professor " . 
      $_SESSION['chosenClass']['instructor'] . "</div><br />";
print "<a href=\"class-step1.php\">Click here to start over.</a>\n";
// Print Bottom Section
print $page->getBottomSection();
// --------------------
