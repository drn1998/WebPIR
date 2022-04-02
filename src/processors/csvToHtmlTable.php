<?php

function csvToHtmlTable($csv) {
    $count = -2; // Check if generally true and ok
    $body = "";
    $rows = explode("\r\n", $csv);

    $body .= "<table>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, ",", '"');
          $body .= "<tr>";
          foreach($cells as &$cell)
                $body .= "<td>" . $cell . "</td>";
      $body .= "</tr>";
      $count++;
    }
    $body .= "</table>";
    //$table = "<b>Number of elements: " . $count . "</b>" . $table;
    return $body;
}

?>
