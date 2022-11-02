<?php
session_start();
$_SESSION['secondVisit']=($_SERVER['REQUEST_TIME']);
if (!isset($_SESSION['firstVisit'])||empty($_SESSION['firstVisit'])){
	$_SESSION['error'] = "Error: Attempted second visit without a first visit.";
	print "</body></html>";
	header("Location: ./session1.php", TRUE, 301);
	exit;
}
print "<!doctype html>\n";
print "<html lang=\"en\">";
print "<head>\n";
print "<meta charset=\"utf-8\">";
print "<title>PHP Session 2</title>\n";
print "</head>\n";
print "<body>\n";
print ("First Visit: ".date('d-m-Y H:i:s',($_SESSION['firstVisit'])));
print "<br/>";
print ("This Visit: ".date('d-m-Y H:i:s',($_SESSION['secondVisit'])));
print "<br/>";
print "<a href=\"./session1.php\">Previous</a>";
print "</body></html>\n";
?>