<?php
session_start();
// Template Create
require_once("../template/BStemplate.php");
require_once("./StudentData.php");
$page = new BSTemplate("regIndex.php");
$sData = new StudentData();
$page->addHeadElement("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">");
$page->addHeadElement("<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// Print Top Section
print $page->getTopSection();
// -----------------
print "\t<h1>Login Page</h1>\n";
print "\t<form action=\"regDash.php\" method=\"POST\">\n";
if (isset($_SESSION['error']) && is_array($_SESSION['error']) && count($_SESSION['error']) > 0) {
  foreach ($_SESSION['error'] as $err => $errMsg) {
    print "\t\t<div class=\"error\">" . $errMsg . "</div>\n";
  }
  $_SESSION['error'] = array();
}
print "\t\t<label><input type=\"number\" name=\"studentId\"</label>";
print "\t\t<div>\n";
print "\t\t\t<input type=\"submit\" name=\"submit\" value=\"Enter\">\n";
print "\t\t</div>\n";
print "\t</form>\n";
// Print Bottom Section
print $page->getBottomSection();
// --------------------