<?php

require_once('encode.php');

function pir_get($convert_to_pir)
{
    $result = array_fill(0, 5, null);

    $output  = "";
    $encoded = encode($convert_to_pir) . '00000'; // Make sure its not empty while still neutral

    $encoded = str_split($encoded);

    for ($i = 0; $i < count($encoded); $i++) {
        try {
            $result[$i % 5] = ($result[$i % 5] + $encoded[$i]) % 10;
        }
        catch (Error $e) {
            throw new Exception('Invalid character occured in \"' . $convert_to_pir . '\".');
        }
    }

    foreach ($result as $digit)
        $output .= $digit;

    return $output;
}

function pir_satisfied($test_string, $pir)
{
    $test_pir = pir_get($test_string);

    if (substr($test_pir, 0, strlen($pir)) == $pir)
        return TRUE;
    else
        return FALSE;
}

?>
