<?php

function preventLinebreak($string)
{
    $output = str_replace(' ', '&nbsp;', $string);
    $output = str_replace('-', '&#8209;', $output);

    return $output;
}

?>
