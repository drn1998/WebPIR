<?php

require_once('methods/pir_code.php');

function csvFilterRowsByPIRcode($csv, $pir, $format) {
    $output = "";
    $conf = parse_ini_file("config/" . $format . ".ini", true);

    $rows = explode(stripcslashes($conf["csv"]["line"]), $csv);

    foreach($rows as &$row){
        $cells = str_getcsv($row, stripcslashes($conf["csv"]["field"]), stripcslashes($conf["csv"]["except"]));

        if(pir_satisfied($cells[0], $pir) == true)
            $output .= $row . stripcslashes($conf["csv"]["line"]);
    }

    return $output;
}

?>
