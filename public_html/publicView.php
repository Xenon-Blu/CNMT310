<?php
//This file needs 'Template.php'
require_once("./template/template.php");

$page = new Template("Public View");

$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print "<h1>Public View</h1>\n";
print "<p>search for class</p>";
//rudimentary skeleton for what will be the searchbar
print "<input type = text name = searchbar>";
print "<input type = submit name = search value = Search>";
print $page->getBottomSection();
?>