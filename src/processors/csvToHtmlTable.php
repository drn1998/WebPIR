<?php

function csvToHtmlTable($csv, $format) {
    $count = -2; // Check if generally true and ok
    $body = "";
    $rows = explode($conf["csv"]["line"], $csv);

    $body .= "<table>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, $conf["csv"]["field"], $conf["csv"]["except"]);
          $body .= "<tr>";
          foreach($cells as &$cell)
                $body .= "<td>" . $cell . "</td>";
      $body .= "</tr>";
      $count++;
    }
    $body .= "</table>";
    //$body = "<b>Number of elements: " . $count . "</b>" . $body;
    return $body;
}

?>
