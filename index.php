<?php
// Template Create
require_once("./pages/template/template.php");
$page = new Template("index.php");
$page->addHeadElement("<link rel=\"stylesheet\" href=\"styles.css\">");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// Print Top Section
print $page->getTopSection();
// -----------------
print "<body>";
print "<h1 class=\"purplified\">CNMT310</h1>";
print "<p> Jacob M. Tracy </p>";
print "<h1>HTML with PHP</h1>";
print "<div id=\"browser\"></div>";
print "<script src=\"getBrowser.js\"></script>";
print " <a href=\"./pizza-form/pizza-step1.php\">Pizza Form</a><br/>";
print " <a href=\"./session/session0.php\">Session Test</a><br/>";
print " <a href=\"./session/session1.php\">Session Lab</a><br/>";
print " <a href=\"./class/class-step1.php\">Session Assignment</a><br/>";
print " <a href=\"./template/class-step1.php\">Template Lab</a><br/>";
// Print Bottom Section
print $page->getBottomSection();
// --------------------
?>