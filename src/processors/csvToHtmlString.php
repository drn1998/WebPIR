<?php

function csvToHtmlString($csv) {
    $body = "";
    $rows = explode("\r\n", $csv);

    $body .= "<p>";

    foreach($rows as &$row){
      $cells = str_getcsv($row, ",", '"');
      $body .= implode(", ", $cells);
      $body .= "&nbsp;&bull; ";
    }
    $body .= "</p>";

    return $body;
}

function csvToHtmlTitleString($csv) {
    $body = "";
    $rows = explode("\r\n", $csv);

    $body .= "<strong>";

    $body .= implode(", ", str_getcsv($rows[0], ",", '"'));

    $body .= "</strong>";

    return $body;
}

?>
