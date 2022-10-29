<?php
session_start();
require_once "../template/BStemplate.php";
require_once "./ClassData.php";
$page = new BSTemplate("regEnroll.php");
$cData = new ClassData();
$classChosen = $cData->getClassById($_POST["class"]);
$page->addHeadElement(
    "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">"
);
$page->addHeadElement(
    "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>"
);
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
print "\t<h1>Enroll</h1>\n";
if (!isset($_SESSION["studentId"]) || empty($_SESSION["studentId"])) {
    $_SESSION["error"][] = "Please enter a Student ID.";
    die(header("Location: ./regIndex.php", true, 301));
}
if (!isset($_POST["class"]) || empty($_POST["class"])) {
    $_SESSION["error"][] = "Please choose a class.";
    die(header("Location: ./regDash.php", true, 301));
}
if ($classChosen == false) {
    $_SESSION["error"][] = "Invalid Class ID.";
    header("Location: ./regDash.php", true, 301);
    die();
}
$_SESSION["class"] = $classChosen;
$_SESSION["confirmed"] = true; 
if ($classChosen["meetingTime"] === "online") {
    print "You have selected " .
        $classChosen["classCode"] .
        " " .
        $classChosen["classNum"] .
        ": " .
        $classChosen["className"] .
        " " .
        $classChosen["meetingTime"] .
        ".";
} else {
    print "You have selected " .
        $classChosen["classCode"] .
        " " .
        $classChosen["classNum"] .
        ": " .
        $classChosen["className"] .
        " on " .
        $classChosen["meetingTime"] .
        ".";
}
print "<br/>";
print "<a href=\"./regReceipt.php\">Confirm your choice and enroll.</a><br/>";
print "<a href=\"./regDash.php\">Go Back</a><br/>";
print "<a href=\"./regIndex.php\">Log Out</a>";
print $page->getBottomSection();
?>