<?php

require('methods/pir_code.php');

function csvFilterRowsByPIRcode($csv, $pir) {
    $output = "";

    $rows = explode("\r\n", $csv);

    foreach($rows as &$row){
        $cells = str_getcsv($row, ",", '"');
        
        if(pir_satisfied($cells[0], $pir) == true)
            $output .= $row . "\r\n";
    }

    return $output;
}

?>
