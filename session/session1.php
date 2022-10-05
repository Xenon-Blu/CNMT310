<?php
session_start();
$_SESSION['firstVisit']=($_SERVER['REQUEST_TIME']);
print "<!doctype html>\n";
print "<html lang=\"en\">";
print "<head>\n";
print "<meta charset=\"utf-8\">";
print "<title>PHP Form Lab</title>\n";
print "</head>\n";
print "<body>\n";
if (isset($_SESSION['error'])){
	print $_SESSION['error'];
	print ("<br>");
	unset($_SESSION['error']);
}
print ("First Visit: ".date("d-m-Y H:i:s",($_SESSION['firstVisit'])));
print "<br/>";
print "<a href=\"./session2.php\">Next</a>";
print "</body></html>";
?>