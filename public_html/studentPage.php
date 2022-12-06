<?php
session_start();
if ($_SESSION["role"]!= "student"){
	$_SESSION['error'][] =  "Access denied, please login.";
	die(header("Location: ./auth/form.php"));
}
//This file needs 'Template.php'
require_once("./template/template.php");

$page = new Template("Student page");
print"<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css\">";
print"<link rel=\"stylesheet\" href=\"/resources/demos/style.css\">";
print"<script src=\"https://code.jquery.com/jquery-3.6.0.js\"></script>";
print"<script src=\"https://code.jquery.com/ui/1.13.2/jquery-ui.js\"></script>";
print"<script src=\"./search.js\"></script>";
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<h1>Student View</h1>\n";
print"<div class=\"ui-widget\"\"ui-widget\">";
print"<label for=\"tags\">Class Search</label><br>";
print"<input id=\"tags\" class=\"ui-autocomplete-input\" autocomplete=\"off\" value = \"\">";
print"<input type=\"hidden\" name=\"selected\" id=\"selected_item\">";
print"</div>";
print $page->getBottomSection();
?>