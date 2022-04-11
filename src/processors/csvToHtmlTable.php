<?php

function csvToHtmlTable($csv, $format)
{
    $count = -2; // Check if generally true and ok
    $body  = "";
    $conf  = parse_ini_file("config/" . $format . ".ini", true);

    $line_sep  = stripcslashes($conf["csv"]["line"]);
    $field_sep = stripcslashes($conf["csv"]["field"]);
    $field_exc = stripcslashes($conf["csv"]["except"]);

    $rows  = explode($line_sep, $csv);

    $body .= "<table>";

    foreach ($rows as &$row) {
        $cells = str_getcsv($row, $field_sep, $field_exc);
        $body .= "<tr>";
        foreach ($cells as &$cell)
            $body .= "<td>" . $cell . "</td>";
        $body .= "</tr>";
        $count++;
    }
    $body .= "</table>";
    //$body = "<b>Number of elements: " . $count . "</b>" . $body;
    return $body;
}

?>
