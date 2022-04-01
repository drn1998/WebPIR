<?php

function csvToHtmlTable($csv) {
    $count = -2; // Check if generally true and ok
    $table = "";
    $rows = explode("\r\n", $csv);

    $table .= "<table>";
  
    foreach($rows as &$row){
      //$row = str_replace("T00:00:00Z", "", $row);
      $cells = str_getcsv($row, ",", '"');
          $table .= "<tr>";
          foreach($cells as &$cell)
                $table .= "<td>" . $cell . "</td>";
      $table .= "</tr>";
      $count++;
    }
    $table .= "</table>";
    //$table = "<b>Number of elements: " . $count . "</b>" . $table;
    return $table;
}

?>
