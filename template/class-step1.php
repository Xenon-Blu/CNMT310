<?php

$classInfo = array( 
              array("classId" => "039821",
                    "className" => "Production Programming",
                    "classCode" => "CNMT",
                    "classNum" => "310",
                    "instructor" => "Suehring",
                    "meetingTime" => "MW 10:00-11:50"),
              array("classId" => "90125",
                    "className" => "Podcasting",
                    "classCode" => "MSTU",
                    "classNum" => "299",
                    "instructor" => "Ingersoll",
                    "meetingTime" => "MTR 13:00-13:50"),
              array("classId" => "5150",
                    "className" => "Percussive Maintenance",
                    "classCode" => "FAC",
                    "classNum" => "433",
                    "instructor" => "Van Halen",
                    "meetingTime" => "M 18:00-20:30"),
            );
session_start();
$_SESSION['chosenClass'] = "";
$_SESSION['confirmed'] = false;
unset($_SESSION['chosenClass']);
$_SESSION['classInfo'] = $classInfo;
// Template Create
require_once("template.php");
$page = new Template("class-step1.php");
$page->addHeadElement("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">");
$page->addHeadElement("<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
// Print Top Section
print $page->getTopSection();
// -----------------
print "\t<h1>Class Picker - Step 1 of 3</h1>\n";
print "\t<form action=\"class-step2.php\" method=\"POST\">\n";
if (isset($_SESSION['error']) && is_array($_SESSION['error']) && count($_SESSION['error']) > 0) {
  foreach ($_SESSION['error'] as $err => $errMsg) {
    print "\t\t<div class=\"error\">" . $errMsg . "</div>\n";
  }
  $_SESSION['error'] = array();
}
foreach ($classInfo as $classDetail) {
  print "\t\t<input type=\"radio\" name=\"class\" value=\"" . $classDetail['classId'] . "\">" .
        $classDetail['classCode'] . " " . $classDetail['classNum'] . ": " . $classDetail['className'] . "<br>\n";
}
print "\t\t<div>\n";
print "\t\t\t<input type=\"submit\" name=\"submitform\" value=\"Proceed\">\n";
print "\t\t</div>\n";
print "\t</form>\n";
// Print Bottom Section
print $page->getBottomSection();
// --------------------