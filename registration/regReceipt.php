<?php
session_start();
require_once "../template/BStemplate.php";
$page = new BSTemplate("regReceipt.php");
$page->addHeadElement(
    "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">"
);
$page->addHeadElement(
    "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>"
);
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
if ($_SESSION["confirmed"] != true) {
    header("Location: ./regIndex.php", true, 301); 
    die();
}
if (!isset($_SESSION["class"]) || empty($_SESSION["chosenClass"])) {
    $_SESSION["error"][] = "Please choose a class.";
    header("Location: ./regDash.php", true, 301); 
    die();
}
$classChosen = $_SESSION["class"]; 
print "<h1>Receipt</h1>\n";
if ($classChosen["meetingTime"] === "online") {
    print "You are now enrolled in  " .
        $classChosen["classCode"] .
        " " .
        $classChosen["classNum"] .
        ": " .
        $classChosen["className"] .
        " " .
        $classChosen["meetingTime"] .
        ".";
} else {
    print "You are now enrolled in  " .
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
print "<a href=\"./regDash.php\">Return to Dashboard</a><br/>";
print "<a href=\"./regIndex.php\">Log Out</a>";
print $page->getBottomSection();
?>
