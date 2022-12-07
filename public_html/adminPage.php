<?php
session_start();
if ($_SESSION["role"]!= "admin"){
	$_SESSION['error'][] =  "Access denied, this requires elevation.";
	die(header("Location: ./auth/form.php"));
}
//This file needs 'Template.php'
require_once("./template/template.php");

$page = new Template("Admin page");

$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<h1>Admin View</h1>";
//Navigates to Add Class page
print "<form action=\"./addClass.php\"  method=\"POST\">";
print "<input type = submit name = submit value = 'add class'>";
print "</form>";
print "<br>";
//Navigates to Edit Class page
print "<form action=\"./editClass.php\"  method=\"POST\">";
print "<input type = submit name = submit value = 'edit class'>";
print "</form>";
print "<br>";
print "<input type = button name = delete value = 'delete class'>";
print "<br>";
print $page->getBottomSection();
?>