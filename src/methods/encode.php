<?php

require_once('remove_accents.php');
require_once('util/removeTextInParentheses.php');

function encode($input)
{
    $json = file_get_contents("config/encode.json");
    $code = json_decode($json, true);

    $input = removeTextInParentheses($input);
    $input  = remove_accents($input);
    $input  = strtolower($input);
    // Move to remove_accents
    $input  = str_replace("'", '', $input);
    $input  = str_replace("-", '', $input);
    $input  = str_replace(".", '', $input);
    $input  = str_replace("Ø", 'o', $input);
    $input  = str_replace("ø", 'o', $input);
    $input  = str_replace("æ", 'ae', $input);
    $input  = str_replace("Æ", 'ae', $input);
    $input  = str_replace("Ð", 'D', $input);
    $input  = str_replace("ð", 'd', $input);

    $input = strtr($input, $code);

    $result = preg_replace('/[^0-9]/', '', $input);
    return $result;
}

?>
