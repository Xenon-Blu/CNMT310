<?php
print "<!doctype html>";
print "<head>";
print "<title>PHP Form Lab pg.2</title>";
print "</head>";
print "<body>";
$required = array("pizzatype","size","quantity",);
foreach ($required as $req){
	if (!isset($_POST[$req])||empty($_POST[$req])){
		print "Please choose all options.<br>";
		print "</body></html>";
		exit;	
	}
}
print "Thank you for submitting the form!<br>";
print "</body></html>";
?>