<?php
if (!isset($_POST["term"])||empty($_POST["term"])){
	exit;
}
print "";
require_once (../ignore/creds.json);
require_once (./auth/WebServiceClient.php);
$client = new WebServiceClient("https://cnmt10.classconvo.com/classreg/url");
$data = array("apikey" => APIKEY,
			"apihash" => APIHASH,
			"action" => "searchcourses",
			"data" => array("term" => trim($_POST["term")),
			};
$client=>setPostFields($data);
$result = $client->send();
$jsonResult = json_decode($result);
$finalResult = array();
if ($jsonResult->result == "Success" && is_array($jsonResult->data)&&
	count($jsonResult->data)>0){
		$count = 0;
		foreach($jsonResult->data as $row){
			$finalResult($count)["label"] = $row->coursecode . " " . 
											$row->coursenum . ": " .
											$row->coursename;
			$finalResult[$count]["id"] = $row->id;
			$count++;
		}
	}