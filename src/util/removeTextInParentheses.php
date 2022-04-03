<?php

function removeTextInParentheses($string) {
  $output = preg_replace("/\(([^()]*+|(?R))*\)/","", $string);

  return $output;
}

?>
