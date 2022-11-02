<?php
require_once("template.php");
class BStemplate extends template{
	function finalizeBottomSection(){
	$returnVal="";
	forEach($this->_bottomElements as $elm){
	$returnval.= $elm;
	}
	$returnVal .= ("<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3\" crossorigin=\"anonymous\"></script>");
	$returnVal .= ("</body>\n");
	$returnVal .= ("</HTML>\n");
	}
	
	function finalizeTopSection() {
    $returnVal = "";
    $returnVal .= "<!doctype html>\n";
    $returnVal .= "<html lang=\"en\">\n";
    $returnVal .= "<head><title>";
    $returnVal .= $this->_title;
    $returnVal .= "</title>\n";
    foreach ($this->_headElements as $elm) {
      $returnVal .= $elm;
    }
	$returnVal .= ("<meta charset =\"utf-8\">")."\n";
	$returnVal .= ("<meta name = \"viewport\" content=\"width=device-width\", initial-scale=1\">");
    $returnVal .= ("<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi\" crossorigin=\"anonymous\">");
    $this->_top = $returnVal;

  } //end function finalizeTopSection
} //end class BStemplate