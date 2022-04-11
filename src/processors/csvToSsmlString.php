<?php

function csvToSsmlString($csv, $format)
{
    $count = -2; // Check if generally true and ok
    $body  = "";
    $conf  = parse_ini_file("config/" . $format . ".ini", true);

    $line_sep  = stripcslashes($conf["csv"]["line"]);
    $field_sep = stripcslashes($conf["csv"]["field"]);
    $field_exc = stripcslashes($conf["csv"]["except"]);

    $rows  = explode($line_sep, $csv);

    $body .= "<speak>";

    foreach ($rows as &$row) {
        $cells = str_getcsv($row, $field_sep, $field_exc);
        foreach ($cells as &$cell)
            $body .= $cell . "<break time=\"180ms\"/>";
        $body .= "<break time=\"250ms\"/>";
        $count++;
    }
    $body .= "</speak>";
    //$body = "<b>Number of elements: " . $count . "</b>" . $body;
    return $body;
}

?>
