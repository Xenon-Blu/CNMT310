<?php
//This file needs 'Template.php'
require_once("./template/template.php");

$page = new Template("Admin page");

$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<h1>Admin View</h1>";
print "<input type = button name = add value = 'add class'>";
print "<br>";
print "<input type = button name = edit value = 'edit class'>";
print "<br>";
print "<input type = button name = delete value = 'delete class'>";
print "<br>";
print $page->getBottomSection();
?>