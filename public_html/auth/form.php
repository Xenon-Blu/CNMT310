<?php
session_start();
require_once( "../template/BStemplate.php");
$page = new BStemplate("Auth");
$page->finalizeTopSection();

//Some libraries require things to be added before the closing body tag.
//Pretty much the same thing as addHeadElement
//Use addBottomElement() for that.  See the method in the Template class.

$page->finalizeBottomSection();

print $page->getTopSection();
print "\t<h1>Login</h1>\n";
print "<form action=\"auth.php\" method=\"POST\">" . PHP_EOL;
print "Username: <input type=\"text\" name=\"username\"><br>" . PHP_EOL;
print "Password: <input type=\"password\" name=\"password\"><br>" . PHP_EOL;
print "<input type=\"submit\" name=\"submit\"><br>" . PHP_EOL;
print "</form>" . PHP_EOL;
if (isset($_SESSION['error']) && is_array($_SESSION['error']) && count($_SESSION['error']) > 0) {
  foreach ($_SESSION['error'] as $err => $errMsg) {
    print "\t\t<div class=\"error\">" . $errMsg . "</div>\n";
  }
  $_SESSION['error'] = array();
}
print $page->getBottomSection();

