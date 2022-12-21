<?php
require_once("./template/BStemplate.php");
$page = new BStemplate("Search for ZIP");
print '<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">';
print '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>';
print '<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>';
print '<script src="./search.js"></script>';
$page->finalizeTopSection(); 
$page->finalizeBottomSection();
print $page->getTopSection();
print '';
print '<div class="ui-widget">';
print '<label for="term">Search: </label>';
print '<input id="term" class="ui-autocomplete-input" autocomplete="off">';
print '<input type="hidden" name="selected" id="selected_item">';
print'</div>';
print'<div class="ui-widget" id="results">';
print'</div>';
print $page->getBottomSection();
?>