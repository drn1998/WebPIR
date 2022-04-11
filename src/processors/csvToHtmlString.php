<?php

require_once('util/preventLinebreak.php');

function csvToHtmlString($csv, $format)
{
    $body = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);

    $line_sep  = stripcslashes($conf["csv"]["line"]);
    $field_sep = stripcslashes($conf["csv"]["field"]);
    $field_exc = stripcslashes($conf["csv"]["except"]);

    $rows = explode($line_sep, $csv);

    $body .= "<p>";

    foreach ($rows as &$row) {
        $cells = str_getcsv($row, $field_sep, $field_exc);
        foreach ($cells as &$cell) {
            if ($cell == "")
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

function csvToHtmlTitleString($csv, $format)
{
    $body = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);
    $rows = explode($line_sep, $csv);

    $body .= "<strong>";

    $body .= implode(", ", str_getcsv($rows[0], $field_sep, $field_exc));

    $body .= "</strong>";

    return $body;
}

?>
