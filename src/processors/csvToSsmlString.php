<?php

function csvToSsmlTable($csv, $format) {
    $count = -2; // Check if generally true and ok
    $body = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);
    $rows = explode(stripcslashes($conf["csv"]["line"]), $csv);

    $body .= "<speak>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, stripcslashes($conf["csv"]["field"]), stripcslashes($conf["csv"]["except"]));
      foreach($cells as &$cell)
          $body .= $cell . "<break time=\"180ms\"/>";
      $body .= "<break time=\"250ms\"/>";
      $count++;
    }
    $body .= "</speak>";
    //$body = "<b>Number of elements: " . $count . "</b>" . $body;
    return $body;
}

?>
