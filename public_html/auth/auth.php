<?php
session_start();
// Change these paths to the location of your files.
require_once("./WebServiceClient.php");
// Credentials file must be outside of document root, as discussed in class
require_once("../../ignore/creds.json");
$json = file_get_contents("../../ignore/creds.json");
$datapull = json_decode($json, true);
// Production code will need additional checks here,
// and proper error messaging handling through session.
if (!isset($_POST['username']) || !isset($_POST['password'])) {
  $_SESSION['error'][] = "Please enter a username and password.";
  die(header("Location: ./form.php", TRUE, 301));
}

$url = "http://cnmt310.classconvo.com/classreg/";
$client = new WebServiceClient($url);
// Defined as constants in creds file.
// Credentials file should be outside of document root
$apikey = $datapull["apikey"];
$apihash = $datapull["apihash"];
$data = array("username" => $_POST['username'], "password" => $_POST['password']);
$action = "authenticate";
$fields = array("apikey" => $apikey,
             "apihash" => $apihash,
              "data" => $data,
             "action" => $action,
             );
$client->setPostFields($fields);

$wsResult = json_decode($client->send());
if (is_null($wsResult) || $wsResult === false 
    || !property_exists($wsResult,"result")) {
  // This should be handled through session and redirected
  $_SESSION['error'][] = "There was an error connecting to authentication service";		
  die(header("Location: ./form.php", TRUE, 301));
  exit;
}
//Ideally, the most likely case is successful auth.
if ($wsResult->result == "Success") {
  // Success means setting things in session
  // Then redirect.
  $userData = $wsResult->data;
}
if ($userData->user_role == "admin"){
	//If admin, send to admin page
	die(header("Location: ../adminPage.php"));
}
if ($userData->user_role == "student"){
	//If student, send to student page
	die(header("Location: ../studentPage.php"));
}
else if ($wsResult->result == "Fail") {
  $_SESSION['error'][] =  "Failed to authenticate, invalid username or password.";
  die(header("Location: ./form.php", TRUE, 301));
  exit;
} else {
  //Likely do not print "Error" conditions because they
  // mean that there's something else wrong in the code
  // Use var_dump() while testing, if needed
  $_SESSION['error'][] = "Code Error.";
  die(header("Location: ./form.php", TRUE, 301));
}
   
