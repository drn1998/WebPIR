<?php

require_once('methods/pir_code.php');

function csvFilterRowsByPIRcode($csv, $pir, $format)
{
    $output = "";
    $conf   = parse_ini_file("config/" . $format . ".ini", true);

    $line_sep  = stripcslashes($conf["csv"]["line"]);
    $field_sep = stripcslashes($conf["csv"]["field"]);
    $field_exc = stripcslashes($conf["csv"]["except"]);

    $rows = explode($line_sep, $csv);

    foreach ($rows as &$row) {
        $cells = str_getcsv($row, $field_sep, $field_exc);

        if (pir_satisfied($cells[0], $pir) == true)
            $output .= $row . $line_sep;
    }

    return $output;
}

?>
