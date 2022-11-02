<?php
session_start();
if (isset($_POST["submit"])) {
    $_SESSION["studentId"] = $_POST["studentId"];
}
require_once "../template/BStemplate.php";
require_once "./StudentData.php";
require_once "./ClassData.php";
$page = new BSTemplate("regDash.php");
$cData = new ClassData();
$sData = new StudentData();
$page->addHeadElement(
    "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">"
);
$page->addHeadElement(
    "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>"
);
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "\t<h1>Dashboard</h1>\n";
if (
    isset($_SESSION["error"]) &&
    is_array($_SESSION["error"]) &&
    count($_SESSION["error"]) > 0
) {
    foreach ($_SESSION["error"] as $err => $errMsg) {
        print "\t\t<div class=\"error\">" . $errMsg . "</div>\n";
    }
    $_SESSION["error"] = [];
}
if (!isset($_SESSION["studentId"]) || empty($_SESSION["studentId"])) {
    $_SESSION["error"][] = "Please enter a Student ID.";
    die(header("Location: ./regIndex.php", true, 301));
}
if ($sData->getStudentById($_SESSION["studentId"]) == false) {
    $_SESSION["error"][] = "Error: No student was found with that ID.";
    die(header("Location: ./regIndex.php", true, 301));
}
$student = $sData->getStudentById($_SESSION["studentId"]);
if ($student["studentMajor"] == "NONE") {
    $_SESSION["error"][] =
        "Error: Your major code is NONE. Please contact the registrar.";
    die(header("Location: ./regIndex.php", true, 301));
}
print "Welcome, " . $student["studentName"] . "." . "<br/>";
print "Your major is " . $student["studentMajor"] . "." . "<br/>";
print "\t<form action=\"regEnroll.php\" method=\"POST\">\n";
if ($student["studentMajor"] == "UND") {
    print "Here is a list of all available classes:" . "<br/>";
    $list = $cData->getClassList();
    foreach ($list as $classDetail) {
        print "\t\t<label><input type=\"radio\" name=\"class\" value=\"" .
            $classDetail["classId"] .
            "\">" .
            $classDetail["classCode"] .
            " " .
            $classDetail["classNum"] .
            ": " .
            $classDetail["className"] .
            "</label><br>\n";
    }
} else {
    print "Here are the available classes in your major:" . "<br/>";
    $list = $cData->getClassByMajor($student["studentMajor"]);
    foreach ($list as $classDetail) {
        print "\t\t<label><input type=\"radio\" name=\"class\" value=\"" .
            $classDetail["classId"] .
            "\">" .
            $classDetail["classCode"] .
            " " .
            $classDetail["classNum"] .
            ": " .
            $classDetail["className"] .
            "</label><br>\n";
    }
}
print "\t\t<div>\n";
print "\t\t\t<input type=\"submit\" name=\"submitform\" value=\"Enroll\">\n";
print "\t\t</div>\n";
print "\t</form>\n<br/>";
print "<a href=\"./regIndex.php\">Log Out</a>";
print $page->getBottomSection();