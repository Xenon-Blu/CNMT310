<?php

class ClassData {

  private $classInfo = array(
              array("classId" => "039821",
                    "className" => "Production Programming",
                    "classCode" => "CNMT",
                    "classNum" => "310",
                    "instructor" => "Suehring",
                    "meetingTime" => "MW 10:00-11:50"),
              array("classId" => "90125",
                    "className" => "Podcasting",
                    "classCode" => "MSTU",
                    "classNum" => "299",
                    "instructor" => "Ingersoll",
                    "meetingTime" => "MTR 13:00-13:50"),
              array("classId" => "5150",
                    "className" => "Percussive Maintenance",
                    "classCode" => "FAC",
                    "classNum" => "433",
                    "instructor" => "Van Halen",
                    "meetingTime" => "M 18:00-20:30"),
              array("classId" => "2921",
                    "className" => "Database",
                    "classCode" => "CNMT",
                    "classNum" => "210",
                    "instructor" => "Staff",
                    "meetingTime" => "online",
                  ),
              array("classId" => "090126",
                    "className" => "Online Streaming",
                    "classCode" => "MSTU",
                    "classNum" => "303",
                    "instructor" => "Suehring",
                    "meetingTime" => "M 18:00-19:50"),
              array("classId" => "90128",
                    "className" => "Writing for News",
                    "classCode" => "MSTU",
                    "classNum" => "333",
                    "instructor" => "Hill",
                    "meetingTime" => "MW 15:00-16:15"),
              array("classId" => "090126",
                    "className" => "Online Streaming",
                    "classCode" => "CNMT",
                    "classNum" => "303",
                    "instructor" => "Suehring",
                    "meetingTime" => "M 18:00-19:50"),
            );

  public function getClassById($classId) {
    $key = array_keys(array_combine(array_keys($this->classInfo), array_column($this->classInfo, 'classId')),$classId);
    if (count($key) > 0) {
      return $this->classInfo[$key[0]];
    } else {
      return false;
    }
  }

  public function getClassByMajor($major) {
    $classes = array(); 
    $foundMajor = false;
    //This would normally be a database lookup and not a loop.
    foreach ($this->classInfo as $key => $row) {
      if ($row['classCode'] == $major) {
        $classes[] = $row;
        $foundMajor = true;
      }
    }
    if ($foundMajor === false) {
      return false;
    } else {
      return $classes;    
    }

  }

  public function getClassList() {
    return $this->classInfo;
  }

}

