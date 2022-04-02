<?php

function csvToHtmlString($csv) {
    $count = -2; // Check if generally true and ok
    $body = "";
    $rows = explode("\r\n", $csv);

    $body .= "<p>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, ",", '"');
      $body .= implode(", ", $cells);
      $body .= "&nbsp;&bull ";
      $count++;
    }
    $body .= "</p>";
    //$table = "<b>Number of elements: " . $count . "</b>" . $table;
    return $body;
}

?>
