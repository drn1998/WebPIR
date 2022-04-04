<?php

require_once("../methods/pir_code.php");

function test_pir_get($input, $expected_output) {
  $real_output = pir_get($input);

  if($real_output == $expected_output)
    echo("Passed!\n");
  else
    echo("Not passed: Expected '" . $expected_output . "' but got '" . $real_output . "'\n");
}

test_pir_get("", "00000");
test_pir_get("Test", "83182");
test_pir_get("test", "83182");
test_pir_get("TeST", "83182");
test_pir_get("keyboard", "71346");

?>
