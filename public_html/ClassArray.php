<?php

class ClassArray {
  private $classInfo = array(
              array("classId" => "10",
                    "className" => "Principles of Computing",
                    "classCode" => "CNMT",
                    "classNum" => "100",
                    "instructor" => "Suehring",
                    "meetingTime" => "MW 10:00-11:50"),
              array("classId" => "20",
                    "className" => "Introduction to Programming",
                    "classCode" => "CNMT",
                    "classNum" => "110",
                    "instructor" => "Suehring",
                    "meetingTime" => "MTR 13:00-13:50"),
              array("classId" => "30",
                    "className" => "Web Design and Development I",
                    "classCode" => "CNMT",
                    "classNum" => "210",
                    "instructor" => "Suehring",
                    "meetingTime" => "M 18:00-20:30"),
              array("classId" => "40",
                    "className" => "Production Programming",
                    "classCode" => "CNMT",
                    "classNum" => "310",
                    "instructor" => "Suehring",
                    "meetingTime" => "online"),
              array("classId" => "50",
                    "className" => "Capstone",
                    "classCode" => "CNMT",
                    "classNum" => "480",
                    "instructor" => "Suehring",
                    "meetingTime" => "M 18:00-19:50"),
            );

  public function getClassList() {
    return $this->classInfo;
  }
//Incomplete createClass Function
  public function createClass($classId, $className, $classCode, $classNum, $instructor, $meetingTime) {
	$class = new array($classId, $className, $classCode, $classNum, $instructor, $meetingTime);
	$this->classInfo = array_push($this->classInfo, $class);
  }
}

