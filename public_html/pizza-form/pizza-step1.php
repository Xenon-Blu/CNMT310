<?php
print "<!doctype html>\n";
print "<html lang=\"en\">";
print "<head>\n";
print "<meta charset=\"utf-8\">";
print "<link rel=\"stylesheet\" href=\"pizza-styles.css\">\n";
print "<title>PHP Form Lab</title>\n";
print "</head>\n";
print "<body>\n";
print "<div><form action=\"pizza-step2.php\" method=\"POST\">\n";
print "<fieldset>\n";
print "<legend>Pizza Form</legend>\n";
print "<label type=\"pizzatype\">Pizza Type:</label>\n";
print "<input type=\"radio\" name=\"pizzatype\" value=\"cheese\">Cheese\n";
print "<input type=\"radio\" name=\"pizzatype\" value=\"veggie\">Veggie\n";
print "<input type=\"radio\" name=\"pizzatype\" value=\"supreme\">Supreme<br/>\n";
print "<label type=\"size\">Size:</label>\n";
print "<input name=\"size\" type=\"radio\" value=\"small\">Small\n";
print "<input name=\"size\" type=\"radio\" value=\"medium\">Medium\n";
print "<input name=\"size\" type=\"radio\" value=\"large\">Large<br/>\n";
print "<label type=\"quantity\">Quantity:</label>\n";
print "<input type=\"number\" name=\"quantity\"><br><br>\n";
print "<input type=\"submit\" name=\"submitform\"value=\"continue\"><br>\n";
print "</fieldset></form></div>\n";
print "</body></html>\n";
?>