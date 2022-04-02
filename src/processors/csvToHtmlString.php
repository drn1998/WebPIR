<?php

function csvToHtmlString($csv) {
    $count = -2; // Check if generally true and ok
    $table = "";
    $rows = explode("\r\n", $csv);

    $table .= "<p>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, ",", '"');
      $table .= implode(", ", $cells);
      $table .= "&nbsp;&bull;&nbsp;";
      $count++;
    }
    $table .= "</p>";
    //$table = "<b>Number of elements: " . $count . "</b>" . $table;
    return $table;
}

?>
