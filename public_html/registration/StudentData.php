<?php

class StudentData {

  private $studentInfo = array(
              array("studentId" => "1154",
                    "studentName" => "A. Student",
                    "studentMajor" => "MSTU",),
              array("studentId" => "1984",
                    "studentName" => "B. Student",
                    "studentMajor" => "FAC",),
              array("studentId" => "1337",
                    "studentName" => "CNMT Student",
                    "studentMajor" => "CNMT",),
              array("studentId" => "0812",
                    "studentName" => "Unde Student",
                    "studentMajor" => "UND",),
              array("studentId" => "331",
                    "studentName" => "No F. Student",
                    "studentMajor" => "NONE",),
            );

  public function getStudentById($studentId) {
    $key = array_keys(array_combine(array_keys($this->studentInfo), array_column($this->studentInfo, 'studentId')),$studentId);
    if (count($key) > 0) {
      return $this->studentInfo[$key[0]];
    } else {
      return false;
    }
  }

}
