<?php

require_once('util/preventLinebreak.php');

function csvToHtmlString($csv, $format) {
    $body = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);
    $rows = explode(stripcslashes($conf["csv"]["line"]), $csv);

    $body .= "<p>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, stripcslashes($conf["csv"]["field"]), stripcslashes($conf["csv"]["except"]));
      foreach($cells as &$cell) {
        if($cell == "")
          $cell = "&varnothing;";
        else
          $cell = preventLinebreak($cell);
      }
      $body .= implode(", ", $cells);
      $body .= "&nbsp;&bull; ";
    }
    $body .= "</p>";

    return $body;
}

function csvToHtmlTitleString($csv, $format) {
    $body = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);
    $rows = explode(stripcslashes($conf["csv"]["line"]), $csv);

    $body .= "<strong>";

    $body .= implode(", ", str_getcsv($rows[0], stripcslashes($conf["csv"]["field"]), stripcslashes($conf["csv"]["except"])));

    $body .= "</strong>";

    return $body;
}

?>
