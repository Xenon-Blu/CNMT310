<?php
// Change these paths to the location of your files.
require_once("./WebServiceClient.php");
// Credentials file must be outside of document root, as discussed in class
require_once("../../no_commit/creds.json");
$json = file_get_contents("../../no_commit/creds.json");
$datapull = json_decode($json, true);
// Production code will need additional checks here,
// and proper error messaging handling through session.
if (!isset($_POST['username']) || !isset($_POST['password'])) {
  die(header("Location: form.php"));
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
  print "There was an error connecting to authentication service";
  exit;
}
//Ideally, the most likely case is successful auth.
if ($wsResult->result == "Success") {
  // Success means setting things in session
  // Then redirect.
  $userData = $wsResult->data;
  print "Successful authentication";
} else if ($wsResult->result == "Fail") {
  print $wsResult->data->message;
} else {
  //Likely do not print "Error" conditions because they
  // mean that there's something else wrong in the code
  // Use var_dump() while testing, if needed
  error_log($wsResult->data->message);
  print "An error has occurred";
}
   
