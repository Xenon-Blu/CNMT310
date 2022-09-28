<?php
$firstnameErr = $lastnameErr = $pizzatypeErr = $quantityErr = $sizeErr = $breakErr = $postErr = "";
$firstname = $lastname = $pizzatype = $quantity = $size = $break = $gettest = $continue = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Error: First name is required.";
	print($firstnameErr);
  } else {
    $firstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Error: Only letters, spaces, and dashes are allowed in first name.";
	  print($firstnameErr);
	  print("<br/>");
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Error: Last name is required.";
	print($lastnameErr);
  } else {
     $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Error: Only letters, spaces, and dashes are allowed in last name.";
	  print($firstnameErr);
	  print("<br/>");
    }
  }
    
  if (empty($_POST["pizzatype"])) {
    $pizzatypeErr = "Error: Pizza type is required.";
	print($pizzatypeErr);
	print("<br/>");
  } else {
    $pizzatype = test_input($_POST["pizzatype"]);
    }

  if (empty($_POST["quantity"])) {
	$quantityErr = "Error: Quantity is required.";
	print($quantityErr);
	print("<br/>");
  } else {
    $quantity = test_input($_POST["quantity"]);
  }

  if (empty($_POST["size"])) {
    $sizeErr = "Error: Size is required";
	print(sizeErr);
	print("<br/>");
  } else {
    $size = test_input($_POST["size"]);
  }
  if (empty($_POST["break"])){
	$break = "";
  } else {
	$breakErr="Test variable is set to invalid. This means you forced an invalid variable error for testing purposes.";
	$break = test_input($_POST["break"]);
	print($breakErr);
	print("<br/>");
  }
	$continue = "continue";
	$_POST["continue"] = test_input("continue");
}

if($_SERVER["REQUEST_METHOD"] != "POST" OR !(empty($_POST["getTest"]))){
	$postErr="Error: form method is GET instead of POST. Header Killed";
	die(header("Location:formtest.php?error=true"));
	print($postErr);
	print("<br/>");
}	
if ($firstnameErr!="" OR $lastnameErr!="" OR $pizzatypeErr!="" OR $quantityErr!="" OR $sizeErr!="" OR  $breakErr!=""){
	print("<br/>");
	print("Since the aforementioned errors were found, your results will not be printed.");
	return;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

print ("First Name:</br>");
print ($firstname);
print ("<br/>");
print ("Last Name:</br>");
print ($lastname);
print ("<br/>");
print ("Pizza Type:</br>");
print ($pizzatype);
print ("<br/>");
print ("Quantity:</br>");
print ($quantity);
print ("<br/>");
print ("Size:</br>");
print ($size);
?>