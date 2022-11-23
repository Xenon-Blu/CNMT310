<?php
// Template Create
require_once("../template/template.php");
$page = new Template("index.php");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// Print Top Section
print $page->getTopSection();
// -----------------
print "<body>";
print "<h1>jQuery</h1>";
print "<script src=\"getBrowser.js\"></script>";
print " <a href=\"./example1.html\">Example 1</a><br/>";
// Print Bottom Section
print $page->getBottomSection();
// --------------------
?>