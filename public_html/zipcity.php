<?php
$zips = array("54481" => "Stevens Point, WI",
			  "54467" => "Plover, WI",
			  "54494" => "Wisconsin Rapids, WI",
              "91505" => "Burbank, CA",
              "53201" => "Milwaukee, WI",
              "54401" => "Wausau, WI");

$result = array();
$count = 0;
foreach ($zips as $zip => $city) {
  $match = strpos(strtolower($city),strtolower($_POST['term']));
  if ($match !== false) {
    $result[$count]["label"] = $city;
    $result[$count]["id"] = $zip;
    $count++;
  }
}
if (count($result) > 0) {
  print(json_encode($result));
} else {
  print(json_encode(array("response" => "Fail", "data" => array("result" => "No such zip"))));
}
